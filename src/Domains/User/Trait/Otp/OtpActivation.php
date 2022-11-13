<?php

namespace Domains\User\Trait\Otp;

use App\Models\OtpVerification;
use Carbon\Carbon;

Trait OtpActivation
{
   
    public static  function generateOtpVerificationCode($email):OtpVerification
    {
      return self::query()->updateOrCreate([
        'email'=>$email,
       ],[
        'email'=>$email,
        'otp'=>generate_otp(),
       ]);
    }

    public function isExpire():bool
    {
      return Carbon::parse($this->created_at)->addHour(24)->isPast();
    }
    

  


}