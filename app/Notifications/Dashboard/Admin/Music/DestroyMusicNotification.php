<?php

namespace App\Notifications\Dashboard\Admin\Music;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class DestroyMusicNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private string $company_name;
    private string $title_ar;
    private string $title_en;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($company_name, $title_ar, $title_en)
    {
        $this->company_name = $company_name;
        $this->title_ar = $title_ar;
        $this->title_en = $title_en;
        $this->onQueue('middle');
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return 'database';
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'title_ar' => __('notification.music.destroy.title', ['company' => $this->company_name], 'ar'),
            'title_en' => __('notification.music.destroy.title', ['company' => $this->company_name], 'en'),
            'body_ar' => __('notification.music.destroy.body', ['company' => $this->company_name, 'music' => $this->title_ar], 'ar'),
            'body_en' => __('notification.music.destroy.body', ['company' => $this->company_name, 'music' => $this->title_en], 'en'),
            'link_id' => null
        ];
    }
}
