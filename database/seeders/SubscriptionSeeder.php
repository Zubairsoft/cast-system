<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = [];

        for ($i = 0; $i < 10; $i++) {

            $subscriptionFactory = Subscription::factory()->make();

            $subscriptions = Subscription::query()->where('subscription_id', $subscriptionFactory->subscription_id)->where('ended_at', '>', Carbon::now());

            if (!$subscriptions->exists()) {
                $users[] = $subscriptionFactory->toArray();
            }
        }
 
        Subscription::query()->insert($users);

    }
}
