<?php

namespace Domains\User\Trait;


use Carbon\Carbon;
use Domains\User\Enums\Status;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

trait HasDefaultAccount
{

    private function defaultAccounts()
    {
        $counter=2;
        return  [
            [
                'id'=>$counter++,
                'name' => 'mohammed zubair',
                'username' => 'mohammed777',
                'email' => 'mohammed@soft.com',
                'password' => Hash::make(defaultPassword()),
                'email_verified_at' => Carbon::now(),
                'avatar' => 'default.png',
                'status' => Arr::random([Status::BLOCKED,Status::ACTIVE])
            ],

            [
                'id' => $counter++,
                'name' => 'omar alhamdi',
                'username' => 'omar88',
                'email' => 'omar@soft.com',
                'password' => Hash::make(defaultPassword()),
                'email_verified_at' => Carbon::now(),
                'avatar' => 'default.png',
                'status' => Arr::random([Status::BLOCKED,Status::ACTIVE])
            ]
        ];
    }
}
