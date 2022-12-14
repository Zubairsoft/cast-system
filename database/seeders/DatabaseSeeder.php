<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(class: [
            AdminSeeder::class,
            UserSeeder::class,
            CompanySeeder::class,
            CategorySeeder::class,
            AlbumSeeder::class,
            ArtistSeeder::class,
        ]);
    }
}
