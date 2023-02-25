<?php

namespace Domains\User\Action;

use App\Models\User;
use Domains\User\Enums\Status;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class BlockingAllUserThatEndedSubscriptionAction
{
    /**
     * blocking all users that subscription ending
     * 
     * @return int
     */
    public function __invoke(): int
    {
        return  User::query()->whereHas('subscription', fn (Builder $query) => $query->where('ended_at', '<', Carbon::now()))->update(['status' => Status::BLOCKED]);
    }
}
