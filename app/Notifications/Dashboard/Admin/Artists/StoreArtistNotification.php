<?php

namespace App\Notifications\Dashboard\Admin\Artists;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StoreArtistNotification extends Notification
{
    use Queueable;

    private $company_name;
    private $artist_name_ar;
    private $artist_name_en;
    private $artist_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($company_name, $artist_name_ar, $artist_name_en, $artist_id)
    {
        $this->company_name = $company_name;
        $this->artist_name_ar = $artist_name_ar;
        $this->artist_name_en = $artist_name_en;
        $this->$artist_id = $artist_id;
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



    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'title_ar' => __('notification.artist.store.title', ['company' => $this->company_name], 'ar'),
            'title_en' => __('notification.artist.store.title', ['company' => $this->company_name], 'en'),
            'body_ar' => __('notification.artist.store.body', ['company' => $this->company_name, 'artist' => $this->artist_name_ar], 'ar'),
            'body_en' => __('notification.artist.store.body', ['company' => $this->company_name, 'artist' => $this->artist_name_en], 'en'),
            'link_id' => $this->artist_id,
        ];
    }
}
