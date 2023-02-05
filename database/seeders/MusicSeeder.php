<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Music;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MusicSeeder extends Seeder
{
    private $music;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $albums = Album::query()->get();

        $albums->each(function ($album) {
            for ($i = 0; $i < 10; $i++) {
                $music = Music::factory()->make([
                    'album_id' => $album->id,
                ])->toArray();

                $this->music[] = $music;
            }
        });

        Music::query()->insert($this->music);
    }
}
