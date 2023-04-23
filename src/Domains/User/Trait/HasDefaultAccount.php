<?php

namespace Domains\User\Trait;


use Carbon\Carbon;
use Domains\User\Enums\Role;
use Domains\User\Enums\Status;

trait HasDefaultAccount
{

    private function defaultAccounts()
    {
        return  [
            [
                'name' => 'mohammed zubair',
                'username' => 'mohammed777',
                'email' => 'mohammed@soft.com',
                'password' => defaultPassword(),
                'email_verified_at' => Carbon::now(),
                'avatar' => 'default.png',
                'status' => Status::ACTIVE,
                'role' => Role::COMPANY
            ],

            [
                'name' => 'omar alhamdi',
                'username' => 'omar88',
                'email' => 'omar@soft.com',
                'password' => defaultPassword(),
                'email_verified_at' => null,
                'avatar' => 'default.png',
                'status' => Status::BLOCKED,
                'role' => Role::COMPANY
            ]
        ];
    }
}
