<?php

namespace App\Http\Controllers\Api\v1\Users\Account\Verification;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\Account\Verification\sendVerificationCodeRequest;
use App\Models\OtpVerification;
use App\Models\User;
use Illuminate\Http\Request;

class SendVerificationCodeController extends Controller
{

    public function __invoke(sendVerificationCodeRequest $request)
    {
        $user=User::query()->where('email',$request->email)->firstOrFail();

        OtpVerification::generateOtpVerificationCode($user->email);

        // Todo send email notification

        return sendSuccessResponse(null,__('auth.send_verification_code'));
    }
}
