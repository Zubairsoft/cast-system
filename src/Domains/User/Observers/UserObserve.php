<?php

namespace Domains\User\Observers;

use App\Models\User;
use Domains\User\Enums\Role;
use Domains\User\Enums\Subscription\Type;
use Illuminate\Support\Carbon;

class UserObserve
{
  public function created(User $user)
  {
    if (!$user->hasRole(Role::ADMIN)) {
      $user->subscription()->create([
        'type' => Type::TRIAL,
        'started_at' => Carbon::now(),
        'ended_at' => Carbon::now()->addDays(30)
      ]);
    }
  }
}
