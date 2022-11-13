<?php

namespace Domains\User\Action\Profile;

use App\Models\User;
use Auth;

class ProfileAction
{
    public function __invoke():User
    {
        return Auth::user();
    }
}
