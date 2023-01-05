<?php

namespace App\Http\Resources\Dashboard\Admin\Notifications;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class DataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'title' => $this['title_' . App::currentLocale()],
            'body' => $this['body_' . App::currentLocale()],
       //     'album_id'=>$this['album_id'],
        ];;
    }
}
