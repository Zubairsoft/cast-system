<?php

namespace App\Http\Resources\Users\Accounts\Companies;

use Illuminate\Http\Resources\Json\JsonResource;

class RepresentativeResource extends JsonResource
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
            'name'=>$this->name,
            'username'=>$this->username,
            'email'=>$this->email,
        ];
    }
}
