<?php

namespace Domains\User\Observers;

use App\Models\User;
use Illuminate\Support\Carbon;

class UserObserve
{
  public function created(User $user)
  {
    $user->subscription()->create([
      'started_at' => Carbon::now(),
      'ended_at' => Carbon::now()->addDays(30)
    ]);
  }
}
