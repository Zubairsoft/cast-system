<?php

namespace Domains\User\Action\Commands;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class ListAllUsersThatEndedSubscriptionAction
{
    /**
     * list all users that subscription is ending
     * 
     * @param array $columns
     * 
     * @return array
     */
    public function __invoke(array $columns): array
    {
        return User::query()->whereHas('subscription', fn (Builder $query) => $query->where('ended_at', '<', Carbon::now()))->get($columns)->toArray();
    }
}
