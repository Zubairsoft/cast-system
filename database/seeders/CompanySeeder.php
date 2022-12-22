<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Domains\User\Enums\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    private array $companies=[];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $counter=0;
        $representatives=User::query()->where('role',Role::COMPANY)->get();
        foreach ($representatives as $representative) {
            $company=Company::factory()->make([
                'id'=>fake()->uuid(),
                'representative_id'=>$representative->id,
            ])->toArray();

            $this->companies[$counter]=$company;
            $counter++;
        }

        Company::query()->insert($this->companies);

    }
}
