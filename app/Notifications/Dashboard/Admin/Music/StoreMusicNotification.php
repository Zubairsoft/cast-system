<?php

namespace App\Notifications\Dashboard\Admin\Music;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StoreMusicNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private string $company_name;
    private string $title_ar;
    private string $title_en;
    private string $music_id;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        string $company_name,
        string $title_ar,
        string $title_en,
        string $music_id,
    ) {
        $this->company_name = $company_name;
        $this->title_ar = $title_ar;
        $this->title_en = $title_en;
        $this->music_id = $music_id;
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
        return ['database'];
    }


    public function toDatabase($notifiable)
    {
        return [
            'title_ar' => __('notification.music.store.title', ['company' => $this->company_name], 'ar'),
            'title_en' => __('notification.music.store.title', ['company' => $this->company_name], 'en'),
            'body_ar' => __('notification.music.store.body', ['company' => $this->company_name, 'music' => $this->title_ar], 'ar'),
            'body_en' => __('notification.music.store.body', ['company' => $this->company_name, 'music' => $this->title_en], 'en'),
            'link_id' => $this->music_id,
        ];
    }
}
