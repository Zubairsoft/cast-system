<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Music>
 */
class MusicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => fake()->uuid(),
            'title_ar' => fake('ar_SA')->title('male'),
            'title_en' => fake()->name('male'),
            'description_ar' => fake('ar_SA')->paragraph(1),
            'description_en' => fake()->paragraph(1),
            'is_active' => Arr::random([true, false]),
        ];
    }
}
