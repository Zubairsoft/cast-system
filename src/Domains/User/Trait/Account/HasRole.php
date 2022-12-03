<?php

namespace Domains\User\Trait\Account;

use Domains\User\Enums\Role;

trait HasRole
{

    public function isAdmin(): bool
    {
        return $this->role === Role::ADMIN;
    }

    public function isCompany(): bool
    {
        return $this->role === Role::COMPANY;
    }

    public function isUser(): bool
    {
        return $this->role === Role::USER;
    }
}
