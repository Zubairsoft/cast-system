<?php

namespace Domains\User\Action\Auth;

use App\Http\Requests\Users\Account\Auth\RegisterRequest;
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

        $attributes['avatar'] = $this->uploadImage($request->avatar,'Users/avatar');
    
        $data = User::create($attributes);

        return $data;
    }
}
