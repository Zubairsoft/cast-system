<?php

namespace App\Http\Controllers\Api\v1\Users\Account\Verification;

use App\Http\Controllers\Controller;
use App\Models\OtpVerification;
use App\Models\User;

class VerificationCodeController extends Controller
{
    public function __invoke(int $code)
    {
        $otpVerification=OtpVerification::query()->where('otp',$code)->firstOrFail();

        if ($otpVerification->isExpire()) {

            $otpVerification->delete();

            return sendErrorResponse(null,__('auth.expired_otp'),422);
        }

        $user=User::query()->firstWhere('email','=',$otpVerification->email);

        if (!$user) {

            return sendErrorResponse(null,__('auth.user_not_found'));
        }

        if ($user->isAccountVerify()) {
            $otpVerification->delete();
            return sendErrorResponse(null,__('auth.already_verified'),422);

        }

        $user->markAccountAsVerify();

        $otpVerification->delete();

        // todo send email notification

        return sendSuccessResponse(null,__('auth.email_verified'));





    }
}
