<?php

namespace App\Http\Controllers\Api\v1\Users\Account\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\Account\Password\ForgetPasswordRequest;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Str;

class ForgetPasswordController extends Controller
{
    public function __invoke(ForgetPasswordRequest $request): JsonResponse
    {
        return PasswordReset::get();
        $user = User::query()->firstWhere('email', '=', $request->email);

        if (!$user) {
            return sendErrorResponse(__('auth.failed'));
        }

        PasswordReset::query()->updateOrCreate([
            'email' => $user->email,
        ], [
            'email' => $user->email,
            'token' => Str::random(64)
        ]);

        return sendSuccessResponse(null, __('passwords.sent'), 202);
    }
}
