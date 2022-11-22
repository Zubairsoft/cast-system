<?php

namespace Database\Seeders;

use App\Models\User;
use Domains\User\Trait\HasDefaultAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    use HasDefaultAccount;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->insert($this->defaultAccounts());
    }
}
