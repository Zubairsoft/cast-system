<?php

namespace App\Http\Controllers\Api\v1\Users\Account\Users\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\Account\Users\Auth\LoginRequest;
use Domains\User\Action\Auth\LoginAction;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request):JsonResponse
    {
        return (new LoginAction)($request);
    }
}
