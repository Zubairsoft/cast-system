<?php

namespace Domains\Categories\Traits;

use Illuminate\Support\Arr;

trait DefaultCategories
{

    private function DefaultCategories(): array
    {
        return [
            [
                'id'=>fake()->uuid(),
                'name_ar' => 'اغاني عربية',
                'name_en' => 'Arabic Songs',
                'is_active' => Arr::random([true, false]),
            ],
            [
                'id'=>fake()->uuid(),
                'name_ar' => 'اغاني انجليزية',
                'name_en' => 'englis Songs',
                'is_active' => Arr::random([true, false]),
            ],
            [
                'id'=>fake()->uuid(),
                'name_ar' => 'اغاني مصرية',
                'name_en' => 'egypt Songs',
                'is_active' => Arr::random([true, false]),
            ],
            [
                'id'=>fake()->uuid(),
                'name_ar' => 'اغاني خليجية',
                'name_en' => 'golf Songs',
                'is_active' => Arr::random([true, false]),
            ],
        ];
    }
}
