<?php

namespace Domains\User\Trait\Defaults;

use App\Models\User;
use Illuminate\Support\Arr;

trait DefaultEmails
{
    private array $emails=[
        'mohammed@zubairsoft.com',
        'omar@zubairsoft.com',
        'salim@zubairsoft.com',
        'bafalh@bootfi.com',
        'zubair@bootfi.com',
        'alhamidi@bootfi.com',
        'khalid@bootfi.com',
        'abdualkarim@bootfi.com',
        'mohammedali@bootfi.com',
        'abofarag@bootfi.com'
    ];

    private function defaultEmails(): string
    {
        do {
            $email = Arr::random($this->emails);
        } while (User::query()->where('email', $email)->exists());

        return $email;
    }

}