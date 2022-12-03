<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Domains\User\Enums\Role;
use Domains\User\Enums\Status;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = [
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@cast.app',
            'password' => defaultPassword(),
            'email_verified_at' => Carbon::now(),
            'role'=>Role::ADMIN,
            'avatar' => 'default.png',
            'status' => Status::ACTIVE

        ];

        User::query()->create($admin);
    }
}
