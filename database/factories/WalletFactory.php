<?php

namespace Database\Factories;

use App\Models\User;
use Domains\User\Enums\Subscription\Type;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class WalletFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users = User::whereHas('subscriptions', fn ($query) => $query->whereNotIn('type', [Type::TRIAL, Type::LIMITED]))->get()->random();
        return [
            'id' => uuid_create(),
            'user_id' => $users->id,
            'amount' => rand(100,1000)
        ];
    }
}
