<?php

namespace Domains\User\Trait\Account;

use Date;
use Domains\User\Enums\Status;

trait AccountVerification
{

    public function isAccountVerify(): bool
    {
        return !is_null($this->email_verified_at) && $this->status === Status::ACTIVE;
    }

    public function markAccountAsVerify()
    {
        $this->forceFill([
            'email_verified_at' => Date::now(),
            'status' => Status::ACTIVE,
        ])->save();
    }

    public function markCompanyAsActive(): void
    {
        $this->company()->update(
            [
                'status' => Status::ACTIVE,
            ]
        );
    }

    public function markCompanyAsBlocked(): void
    {
        $this->company()->update(
            [
                'status' => Status::BLOCKED,
            ]
        );
    }
}
