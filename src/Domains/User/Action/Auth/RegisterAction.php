<?php

namespace Domains\User\Action\Auth;

use App\Http\Requests\Users\Account\Users\Auth\RegisterRequest;
use App\Models\User;
use Domains\Helper\Trait\UploadMedia;
use Illuminate\Http\JsonResponse;

class RegisterAction
{
    use UploadMedia;

    /**
     * @param RegisterRequest $request
     * 
     * @return JsonResponse
     */
    public function __invoke(RegisterRequest $request): User
    {
        $attributes = $request->validated();
            
        $data = User::create($attributes);

        return $data;
    }
}
