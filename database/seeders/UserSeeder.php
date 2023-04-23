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
        collect($this->defaultAccounts())->each(function($user){
             User::query()->create($user);
        });
       User::factory(20)->create();

    }
}
