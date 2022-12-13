<?php

namespace App\Http\Resources\Users\Accounts\Companies;

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
            'company_name' => $this->name,
            'address' => $this->address,
            'document_license' => $this->license_document,
            'account_type' => $this->account_type,
            'representative'=>RepresentativeResource::make($this->representative)
        ];
    }
}
