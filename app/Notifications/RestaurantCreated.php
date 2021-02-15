<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Restorant;

class RestaurantCreated extends Notification
{
    use Queueable;

    protected $password;
    protected $restaurant;
    protected $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($password,$restaurant,$user)
    {
        $this->password = $password;
        $this->restaurant = $restaurant;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting("Здраво почитувани".$this->user->name)
                    ->subject("Профилот е креиран на".env('APP_NAME',""))
                    ->line("Креиравме профил за сосптвеникот на ресторанот."." ".$this->restaurant->name)
                    ->action('Логирај те се ', url(env('APP_URL',"")."/login"))
                    ->line("Корисничко име".": ".$this->user->email)
                    ->line("Лозинка".": ".$this->password)
                    ->line("Можете да ја ресетирате вашата постоечка лозинка")
                    ->line("Ви благодариме на довербата");
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
}
