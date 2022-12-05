<?php

namespace Domains\User\Action\Auth;

use App\Http\Requests\Users\Account\Users\Auth\LoginRequest;
use Auth;
use Domains\User\Action\Auth\AccessToken\CreateAccessToken;
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

            if (!$user->isAccountVerify()) {
                return sendErrorResponse(null,__('auth.not_activated_account'),422);
            }

            $user =(new CreateAccessToken)($user);

            return sendSuccessResponse($user, "login successfully");
        }

        return sendErrorResponse(null,__('passwords.user'),422);
    }
}
