<?php

namespace Domains\User\Action\Auth;

use App\Http\Requests\Users\Account\Auth\LoginRequest;
use Auth;
use Illuminate\Http\JsonResponse;

class LoginAction
{

    /**
     * @param LoginRequest $request
     * 
     * @return JsonResponse
     */
    public function __invoke(LoginRequest $request): JsonResponse
    {
        Auth::shouldUse(config('auth.user_session_login'));

        if (Auth::attempt($request->validated())) {

            $user = Auth::user();

            $user['token'] = $user->createToken('user token')->plainTextToken;

            return sendSuccessResponse($user, "login successfully");
        }

        return sendErrorResponse(null,__('passwords.user'));
    }
}
