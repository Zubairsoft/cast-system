<?php

namespace App\Notifications\Dashboard\Admin\Albums;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\App;

class StoreAlbumNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $company_name;
    private $album_name_ar;
    private $album_name_en;
    private $album_id;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($company_name, $album_name_ar, $album_name_en, $album_id)
    {
        $this->company_name = $company_name;
        $this->album_name_ar = $album_name_ar;
        $this->album_name_en = $album_name_en;
        $this->album_id = $album_id;
        $this->locale = App::currentLocale();
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
            'title_en' => __('notification.add_album.title', ['company' => $this->company_name], 'en'),
            'body_en' => __('notification.add_album.body', ['company' => $this->company_name, 'album' => $this->album_name_en], 'en'),
            'title_ar' => __('notification.add_album.title', ['company' => $this->company_name], 'ar'),
            'body_ar' => __('notification.add_album.body', ['company' => $this->company_name, 'album' => $this->album_name_ar], 'ar'),
            'link_id' => $this->album_id,
        ];
    }
}
