<?php

namespace App\Notifications\Companies\Accounts;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CompanyRegistered extends Notification
{
    use Queueable;

    private $companyOwner;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($representative)
    {
        $this->companyOwner = $representative;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
            ->line('The Name of Company is ' . $this->companyOwner->company->name)
            ->line('And The emil of Company is ' . $this->companyOwner->email)
            ->action('Show Company', route('dashboard.admin.company.show',$this->companyOwner->company->id));
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
            'id'=>$this->companyOwner->id,
            'company_name'=>$this->companyOwner->company->name,
            'representative'=>$this->companyOwner->name,
        ];
    }
}
