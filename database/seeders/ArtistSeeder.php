<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtistSeeder extends Seeder
{
    private array $artist;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies=Company::query()->get()->modelKeys();
        foreach($companies as $company){
       for ($i=0; $i < 5; $i++) { 
        $artist= Artist::factory()->make([
            'id'=>fake()->uuid(),
            'company_id'=>$company,
        ])->toArray();

        $this->artist[]=$artist;
       }
        }
        Artist::query()->insert($this->artist);
    }
}
