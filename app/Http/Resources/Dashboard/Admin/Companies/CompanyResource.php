<?php

namespace App\Http\Resources\Dashboard\Admin\Companies;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            'id'=>$this->id,
            'company_name' => $this->name,
            'address' => $this->address,
            'document_license' => $this->license_document,
            'account_type' => $this->account_type,
            'status' => $this->status,
            'representative' => RepresentativeResource::make($this->representative)
        ];
    }
}
