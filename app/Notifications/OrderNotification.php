<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Akaunting\Money\Currency;
use Akaunting\Money\Money;
use NotificationChannels\OneSignal\OneSignalChannel;
use NotificationChannels\OneSignal\OneSignalMessage;
use NotificationChannels\OneSignal\OneSignalWebButton;
use NotificationChannels\Twilio\TwilioChannel;
use NotificationChannels\Twilio\TwilioSmsMessage;

class OrderNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $order;
    protected $status;
    public function __construct($order,$status="1")
    {
        $this->order = $order;
        $this->status = $status;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        $notificationClasses=['mail','database'];
        if(env('ONESIGNAL_APP_ID',false)){
            array_push($notificationClasses,OneSignalChannel::class);
        }
        if(env('TWILIO_ACCOUNT_SID',false)&&env('SEND_SMS_NOTIFICATIONS',false)){
            array_push($notificationClasses,TwilioChannel::class);
        }
        return $notificationClasses;
    }

    public function toTwilio($notifiable)
    {
        if($this->status.""=="1"){
            //Created
            $line="Само што пристигна нова нарачка";
        }else if($this->status.""=="3"){
            //Accepted
            $line= "Вашата нарачка е прифатена. Се работи на нејзе";
        }else if($this->status.""=="4"){
            //Assigned to driver
            $line="Имате нова нарачка која ви е доделена вам.";
        }else if($this->status.""=="5"){
            //Prepared
            $line= $this->order->delivery_method && $this->order->delivery_method.""=="1" ? "Вашата нарачка е спремна за испорака. Очекувајте не наскоро" : "Вашата нарачка е спремна за подигање. Ве очекуваме";
        }else if($this->status.""=="9"){
            //Rejected
            $line="За жал вашата нарачка е одбиена. Настана проблем со нарачката. Ве молиме контактирајте не за повеќе информации.";
        }

        return (new TwilioSmsMessage())
            ->content($line)
            ->from(config('global.site_name') ? config('global.site_name') : "SMSInfo");
    }

    public function toOneSignal($notifiable)
    {

        //$greeting=__('Your order has been accepted');
        //$line=__('We are now working on it!');

        if($this->status.""=="1"){
            //Created
            $greeting="Има нова нарачка";
            $line="Пристигна нова нарачка";
        }else if($this->status.""=="3"){
            //Accepted
            $greeting="Вашата нарачка е прифатена";
            $line="Во моментот работиме на нејзе";
        }else if($this->status.""=="4"){
            //Assigned to driver
            $greeting="Има нова нарачка за вас";
            $line="Пристигна нова нарачка која ви е доделена вам";
        }else if($this->status.""=="5"){
            //Prepared
            $greeting="Вашата нарачка е спремна";
            $line= $this->order->delivery_method && $this->order->delivery_method.""=="1" ? "Вашата нарачка е спремна за испорака. Очекувајте не наскоро." : "Вашата нарачка е спремна за подигање. Ве очекуваме наскоро";
        }else if($this->status.""=="9"){
            //Rejected
            $greeting= "Нарачката е одбиена";
            $line= "За жал вашата нарачка е одбиена. Настана проблем со истата. Ве молиме контактирајте не за повеќе информации";
        }

        $url= url('/orders/'.$this->order->id);

        //Inders in the db

        return OneSignalMessage::create()
            ->subject($greeting)
            ->body($line)
            ->url($url)
            ->webButton(
                OneSignalWebButton::create('link-1')
                    ->text(__('View Order'))
                    ->icon('https://upload.wikimedia.org/wikipedia/commons/4/4f/Laravel_logo.png')
                    ->url($url)
            );
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if($this->status.""=="1"){
            //Created
            $greeting="Има нова нарачка";
            $line= "Пристигна нова нарачка";
        }else if($this->status.""=="3"){
            //Accepted
            $greeting= "Вашата нарачка е прифатена";
            $line= "Во моментот работиме на нејзе";
        }else if($this->status.""=="4"){
            //Assigned to driver
            $greeting= "Има нова нарачка за вас";
            $line= "Пристигна нова нарачка која ви е доделена вам.";
        }else if($this->status.""=="5"){
            //Prepared
            $greeting="Вашата нарачка е спремна";
            $line= $this->order->delivery_method && $this->order->delivery_method.""=="1" ? "Вашата нарачка е спремна за испорака. Очекувајте не наскоро" : "Вашата нарачка е спремна за подигање. Ве очекуваме наскоро.";
        }else if($this->status.""=="9"){
            //Rejected
            $greeting= "Нарачката е одбиена";
            $line="За жал вашата нарачка е одбиена. Настана проблем со истата. Ве молиме контактирајте не за повеќе информации.";
        }


        $message=(new MailMessage)
            ->greeting($greeting)
            ->subject("Нотификација од нарачка: ".$this->order->id)
            ->line($line)
            ->action("Погледни нарачка", url('/orders/'.$this->order->id));


        //Add order details
            $message->line("Ставки од нарачка");
            $message->line(__('________________'));
            foreach ($this->order->items as $key => $item) {
                $lineprice= $item->pivot->qty." X ".$item->name." ( ".money( $item->price, env('CASHIER_CURRENCY','usd'),true)." ) = ".money( $item->pivot->qty*$item->price, env('CASHIER_CURRENCY','usd'),true);
                $message->line($lineprice);
            }
            $message->line(__('________________'));

            if($this->order->delivery_method && $this->order->delivery_method.""=="1"){
                $message->line("Испорака".": ".money( $this->order->delivery_price, env('CASHIER_CURRENCY','usd'),true));
            }

            $message->line("Вкупно".": ".money( $this->order->order_price, env('CASHIER_CURRENCY','usd'),true));

        return $message;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    public function toDatabase($notifiable){
        if($this->status.""=="1"){
            //Created
            $greeting="Има нова нарачка ";
            $line="Пристигна нова нарачка";
        }else if($this->status.""=="3"){
            //Accepted
            $greeting= "Вашата нарачка е прифатена";
            $line=__('order')."#".$this->order->id." "."Во моментот работиме на истата";
        }else if($this->status.""=="4"){
            //Assigned to driver
            $greeting= "Има нова нарачка за вас";
            $line= "Пристигна нова нарачка која ви е доделена вам";
        }else if($this->status.""=="5"){
            //Prepared
            $greeting= "Вашата нарачка е спремна";
            $line= $this->order->delivery_method && $this->order->delivery_method.""=="1" ? "Вашата нарачка е спремна за испорака. Очекувајте не наскоро" : "Вашата нарачка е спремна за подигање. Ве очекуваме наскоро.";
        }else if($this->status.""=="9"){
            //Rejected
            $greeting="Нарачката е одбиена";
            $line= "За жал вашата нарачка е одбиена. Настана проблем со истата. Ве молиме контактирајте не за повеќе информации.";
        }

        return [
            'title'=>$greeting,
            'body' =>$line
        ];
    }
}
