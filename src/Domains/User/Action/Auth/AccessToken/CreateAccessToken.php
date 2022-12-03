<?php

namespace Domains\User\Action\Auth\AccessToken;

use App\Models\User;

class CreateAccessToken
{
    public function __invoke(User $user):User
    {
        $user['token']=$user->createToken('User token')->plainTextToken;
        
        return $user;
    }
}