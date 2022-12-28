<?php

namespace Database\Seeders;

use App\Models\Category;
use Domains\Categories\Traits\DefaultCategories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    use DefaultCategories;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::query()->insert($this->DefaultCategories());
    }
}
