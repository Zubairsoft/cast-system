<?php

namespace App\Http\Controllers\Api\v1\Users\Account\Companies\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\Account\Companies\Auth\LoginRequest;
use Auth;
use Domains\User\Enums\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request): JsonResponse
    {
        Auth::shouldUse(config('auth.user_session_login'));
        if (!Auth::attempt($request->validated() + ['role' => Role::COMPANY])) {
            return sendErrorResponse(null, __('auth.failed'), 422);
        }

        $user = Auth::user();

        if (!$user->isAccountVerify()) {
            return sendErrorResponse(null, __('auth.not_activated_account'), 422);
        }

        $user['token'] = $user->createToken('company access token')->plainTextToken;

        return sendSuccessResponse($user, __('messages.login'), 200);
    }
}
