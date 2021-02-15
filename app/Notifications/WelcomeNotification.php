<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\User;

class WelcomeNotification extends Notification
{
    use Queueable;

    protected $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
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

       if($this->user->active.""=="1"){
        return (new MailMessage)
            ->greeting("Здраво почитувани".$this->user->name)
            ->subject("Ви благодариме што се регистриравте на ".env('APP_NAME',""))
            ->action(__('Visit')." ".env('APP_NAME',""), url(env('APP_URL',"")))
            ->line(__('Ви благодариме на довербата.'));;
       }else{
        return (new MailMessage)
            ->greeting(__('Здраво почитувани ').$this->user->name)
            ->subject(__('Ви благодариме што се регистриравте на ').env('APP_NAME',""))
            ->action(__('Посетете не на')." ".env('APP_NAME',""), url(env('APP_URL',"")))
            ->line(__('Вашиот профил треба да биде одобрен, кога ќе биде одобрен ќе ве исконтактираме.'));;
       }

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
