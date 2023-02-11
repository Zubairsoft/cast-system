<?php

namespace App\Http\Resources\Dashboard\Companies\Music;

use App\Http\Resources\Dashboard\Companies\Albums\AlbumResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class MusicResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'music' => Storage::url($this->music),
            'description' => $this->description,
            'status' => $this->status,
            'album' => AlbumResource::make($this->whenLoaded('album')),
        ];
    }
}
