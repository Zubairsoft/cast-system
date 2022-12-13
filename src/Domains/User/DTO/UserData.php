<?php

namespace Domains\User\DTO;

use Spatie\LaravelData\Data;
use Illuminate\Http\UploadedFile;
use Request;

class UserData extends Data
{

    public function __construct(
        public ?string $name,
        public ?string $username,
        public ?string $email,
        public ?string $password,
        public ?UploadedFile $avatar
    ) {
    }

    public static function fromRequest($request): self
    {
        return new self(
            $request->input('name'),
            $request->input('username'),
            $request->input('email'),
            $request->input('password'),
            $request->input('avatar')
        );
    }
}
