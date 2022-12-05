<?php

namespace App\Notifications\Companies\Accounts;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CompanyRegistered extends Notification
{
    use Queueable;

    private $name;
    private $email;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name,$email)
    {
        $this->name=$name;
        $this->email=$email;
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
                    ->subject('New Company Registered')        
                    ->line('The Name of Company is '.$this->name)
                    ->line('And The emil of Company is '.$this->email)
                    ->action('Show Company', url('/'));
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
