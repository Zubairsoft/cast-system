<?php

namespace Domains\User\Observers;

use App\Models\User;
use Domains\User\Enums\Role;
use Domains\User\Trait\Account\ManageSubscription;

class UserObserve
{
  use ManageSubscription;

  public function created(User $user)
  {
    if (!$user->hasRole(Role::ADMIN)) {
      if ($user->hasRole(Role::COMPANY)) {
        $this->setSubscriptionAsTrial($user);
      }
      $this->setSubscriptionAsLimited($user);
    }
  }
}
