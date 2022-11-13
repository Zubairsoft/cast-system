<?php
namespace Domains\User\Action\Auth;

use Auth;

class LogoutAction
{

    /**
     * @return void
     */
    public function __invoke():void
    {
        Auth::user()->tokens()->delete();

    }

}
