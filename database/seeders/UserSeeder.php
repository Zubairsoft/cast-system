<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=[
            [
                'name'=>'Mohammed Zubair',
                'email'=>'admin@cast.app',
                'password'=>Hash::make(defaultPassword()),
                'email_verified_at'=>Carbon::now(),
                'avatar'=>'default.png',
                'is_active'=>true
            ]
            ];

        User::query()->insert($user);
    }
}
