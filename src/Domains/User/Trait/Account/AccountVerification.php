<?php

namespace Domains\User\Trait\Account;

use Date;

trait AccountVerification 
{

    public function isAccountVerify():int
    {
        return !is_null($this->email_verified_at) && $this->is_active ;
    }

    public function markAccountAsVerify(){
        $this->forceFill([
            'email_verified_at'=>Date::now(),
            'is_active'=>true
        ])->save();
    }

    



}