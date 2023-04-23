<?php

namespace Domains\User\Trait\Account;

use App\Models\User;
use Domains\User\Enums\Subscription\Type;
use Illuminate\Support\Carbon;

trait ManageSubscription
{
    private function setSubscriptionAsLimited(User $user): void
    {
        $user->subscriptions()->make($this->SubscriptionAttribute(Type::LIMITED))->save();
    }

    private function setSubscriptionAsTrial(User $user): void
    {
        $user->subscriptions()->make($this->SubscriptionAttribute(Type::TRIAL))->save();
    }

    private function setSubscriptionAsMonthly(User $user): void
    {
        $user->subscriptions()->make($this->SubscriptionAttribute(Type::MONTHLY))->save();
    }

    private function setSubscriptionAsYearly(User $user): void
    {
        $user->subscriptions()->make($this->SubscriptionAttribute(Type::YEARLY))->save();
    }

    private function SubscriptionAttribute(string|null $type = null): array
    {
        $attributes = [
            'type' => $type ?? Type::TRIAL,
            'started_at' => Carbon::now(),
        ];

        if (!in_array($type, [Type::TRIAL, Type::MONTHLY, Type::YEARLY])) {
            return $attributes;
        }

        $attributes['ended_at'] = $type === Type::YEARLY ?  Carbon::now()->addYear() : Carbon::now()->addDays(30);

        return $attributes;
    }
}
