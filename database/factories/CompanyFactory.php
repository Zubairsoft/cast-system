<?php

namespace Database\Factories;

use Domains\Companies\Enums\AccountType;
use Domains\User\Enums\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->company(),
            'address'=>$this->faker->address(),
            'license_document'=>'test.pdf',
            'status'=>Status::getRandomValue(),
            'account_type'=>AccountType::getRandomValue()
        ];
    }
}
