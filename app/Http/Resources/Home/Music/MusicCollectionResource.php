<?php

namespace App\Http\Resources\Home\Music;

use App\Http\Resources\Dashboard\Companies\Albums\AlbumResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MusicCollectionResource extends JsonResource
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
            'music' => $this->music,
            'description' => $this->description,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'comments_count' => $this->comments_count,
            'likes_count' => $this->likes_count,
            'is_liked' => $this->is_liked,
            'is_favorite' => $this->is_favorite,
            'album' => AlbumResource::make($this->whenLoaded('album')),
            'comments' => $this->whenLoaded('comments')
        ];
    }
}
