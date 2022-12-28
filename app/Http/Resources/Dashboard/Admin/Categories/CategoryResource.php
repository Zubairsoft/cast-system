<?php

namespace App\Http\Resources\Dashboard\Admin\Categories;

use App\Http\Resources\Support\Images\ImageResource;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class CategoryResource extends JsonResource
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
            'status' => $this->status,
            'image' => ImageResource::make($this->image),
        ];
    }
}
