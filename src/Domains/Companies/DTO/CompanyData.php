<?php

namespace Domains\Companies\DTO;

use Spatie\LaravelData\Data;
use Illuminate\Http\UploadedFile;

class CompanyData extends Data
{

    public function __construct(
        public ?string $name,
        public ?string $address,
        public ?UploadedFile $license_document,
        public ?string $status,
        public ?string $account_type,
    ) {
    }

    public static function fromRequest($request): self
    {
        return new self(
            $request->post('company_name'),
            $request->post('address'),
            $request->post('license_document'),
            $request->post('status'),
            $request->post('account_type')

        );
    }
}
