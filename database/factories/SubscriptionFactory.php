<?php

namespace Database\Factories;

use App\Models\Subscription;
use App\Models\User;
use Domains\User\Enums\Role;
use Domains\User\Enums\Subscription\Type;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscription>
 */
class SubscriptionFactory extends Factory
{
    protected $model=Subscription::class;

    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::query()->whereNot('role', Role::ADMIN)->get()->random();
        $type = Arr::random([Type::MONTHLY, Type::YEARLY]);


        return [
            'id'=>fake()->uuid(),
            'subscription_id' => $user->id,
            'type' => $type,
            'started_at' => now(),
            'ended_at' => $type === Type::MONTHLY ? Carbon::now()->addDays(30) : Carbon::now()->addYear(),
        ];
    }
}
