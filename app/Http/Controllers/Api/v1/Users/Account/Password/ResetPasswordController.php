<?php

namespace App\Http\Controllers\Api\v1\Users\Account\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\Account\Password\ResetPasswordRequest;
use App\Models\PasswordReset;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class ResetPasswordController extends Controller
{

    public function __invoke(ResetPasswordRequest $request): JsonResponse
    {

        $resetPassword = PasswordReset::query()->firstWhere('token', '=', $request->token);

        if (!$resetPassword) {
            return sendErrorResponse(__('passwords.user'));
        }

        if (Carbon::parse($resetPassword->created_at)->addHour()->isPast()) {
            $this->removeToken($resetPassword->email);
            return sendErrorResponse(__('passwords.token'), 422);
        }

        $user = User::query()->firstWhere('email', '=', $resetPassword->email);
        if (!$user) {

            $this->removeToken($resetPassword->email);

            return sendErrorResponse(__('passwords.user'));
        }

        $user->update([
            'password' => $request->password
        ]);

        $this->removeToken($user->email);

        return sendSuccessResponse(null, __('passwords.reset'), 202);
    }

    private function removeToken($email): void
    {
      DB::table('password_resets')->where('email',$email)->delete();
    }
}
