<?php

namespace App\Http\Controllers\Api\v1\Users\Account\Auth;

use App\Http\Controllers\Controller;
use Domains\User\Action\Auth\LogoutAction;
use Illuminate\Http\JsonResponse;

class LogoutController extends Controller
{
    public function __invoke():JsonResponse
    {
         (new LogoutAction)();

         return sendSuccessResponse(null,__('auth.logout'),204);

    }
}
