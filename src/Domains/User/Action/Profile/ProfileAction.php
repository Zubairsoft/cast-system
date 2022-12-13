<?php

namespace Domains\User\Action\Profile;

use App\Models\User;
use Auth;

class ProfileAction
{
    /**
     * @return User
     */
    public function __invoke():User
    {
        return Auth::user();
    }
}
