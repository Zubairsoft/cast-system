<?php

namespace Domains\User\Action\Auth;

use App\Http\Requests\Users\Account\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class RegisterAction
{

    /**
     * @param RegisterRequest $request
     * 
     * @return JsonResponse
     */
    public function __invoke(RegisterRequest $request): User
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
