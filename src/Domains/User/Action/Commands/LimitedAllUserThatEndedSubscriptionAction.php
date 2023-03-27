<?php

namespace Domains\User\Action\Commands;

use App\Models\User;
use Domains\User\Enums\Subscription\Type;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class LimitedAllUserThatEndedSubscriptionAction
{

    public function __invoke()
    {
        $counter = 0;

        User::query()
            ->whereHas(
                'subscription',
                fn (Builder $query) => $query->where('ended_at', '<', Carbon::now())
            )->each(function ($user) use ($counter) {
                $user->forceFill([
                    'type' => Type::LIMITED
                ])->save();
                $counter++;
            });

        return $counter;
    }
}
