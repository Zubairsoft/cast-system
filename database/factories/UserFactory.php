<?php

namespace Database\Factories;

use App\Models\User;
use Domains\User\Enums\Role;
use Domains\User\Trait\Defaults\DefaultEmails;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    use DefaultEmails;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'username'=>fake()->unique()->name(),
            'email' => fake()->unique()->email(),
            'email_verified_at' => now(),
            'password' => defaultPassword(), 
            'remember_token' => Str::random(10),
            'role'=>Role::USER,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

}
