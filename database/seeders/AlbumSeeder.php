<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Category;
use App\Models\User;
use Arr;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    private array $albums = [];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = User::query()->has('company')->get()->modelKeys();
        $categories = Category::query()->get()->modelKeys();

        foreach ($companies as $company) {
            foreach ($categories as $category) {
                for ($i = 0; $i < 5; $i++) {
                    $album = Album::factory()->make([
                        'id' => fake()->uuid(),
                        'is_active' => Arr::random([true, false]),
                        'creator_id' => $company,
                        'category_id' => $category,
                    ])->toArray();
                    $this->albums[] = $album;
                }
            }
        }

        Album::query()->insert($this->albums);
    }
}
