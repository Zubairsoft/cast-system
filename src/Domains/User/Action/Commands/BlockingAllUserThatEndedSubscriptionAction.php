<?php

namespace Domains\User\Action\Commands;

use App\Models\User;
use Domains\User\Enums\Role;
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
        return  User::query()->where('role',Role::COMPANY)->whereHas('subscription', fn (Builder $query) => $query->where('ended_at', '<', Carbon::now()))->update(['status' => Status::BLOCKED]);
    }
}
