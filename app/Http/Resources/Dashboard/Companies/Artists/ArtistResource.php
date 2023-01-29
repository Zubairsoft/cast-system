<?php

namespace App\Http\Resources\Dashboard\Companies\Artists;

use App\Http\Resources\Support\Images\ImageResource;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class ArtistResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array|Arrayable|JsonSerializable
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'date_of_birthday' => $this->date_of_birth,
            'country' => $this->country,
            'status' => $this->status,
            'image' => ImageResource::make($this->whenLoaded('image')),
        ];
    }
}
