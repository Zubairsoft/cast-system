<?php

namespace App\Http\Controllers\Api\v1\Users\Account\Companies\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __invoke():JsonResponse
    {
        $user=Auth::user();
        $user->currentAccessToken()->delete();
        return sendSuccessResponse(null,__('auth.logout'));
    }
}
