<?php

namespace App\Http\Controllers\Api\v1\Users\Account\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\Account\Auth\RegisterRequest;
use Domains\User\Action\Auth\RegisterAction;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{

    /**
     * @param RegisterRequest $request
     * 
     * @return JsonResponse
     */
    public function __invoke(RegisterRequest $request): JsonResponse
    {
        $registerUser = (new RegisterAction)($request);

        return sendSuccessResponse($registerUser,__('auth.success_register'));
    }
}
