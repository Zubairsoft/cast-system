<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\Auth\LoginRequest;
use Auth;
use Domains\User\Enums\Role;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request): JsonResponse
    {
        Auth::shouldUse(config('auth.user_session_login'));
        if (!Auth::attempt($request->validated() + ['role' => Role::ADMIN])) {
            return sendErrorResponse(__('auth.user_not_found'), 422);
        }
        $admin = Auth::user();
        $admin['token'] = $admin->createToken('Admin Access Token')->plainTextToken;
        return sendSuccessResponse($admin, __('auth.success_login'));
    }
}
