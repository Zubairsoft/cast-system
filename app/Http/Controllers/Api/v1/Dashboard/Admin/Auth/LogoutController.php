<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Admin\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __invoke()
    {
        $admin = Auth::user();
        $admin->currentAccessToken()->delete();
        return sendSuccessResponse(null, __('auth.logout'));
    }
}
