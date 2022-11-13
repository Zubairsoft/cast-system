<?php

namespace Domains\User\Action\Auth;

use App\Http\Controllers\Api\v1\Users\Account\Auth\RegisterController;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class RegisterAction
{

    /**
     * @param RegisterRequest $request
     * 
     * @return JsonResponse
     */
    public function __invoke(RegisterController $request): User
    {
        $attributes = $request->validated();

        if (is_file($request->avatar)) {
            $attributes['avatar'] = $request->avatar->storePublicly('Users/avatar');
        }

        $attributes['avatar'] = $attributes['avatar'] ?? 'default.png';

        $data = User::create($attributes);

        return $data;

    }
}
