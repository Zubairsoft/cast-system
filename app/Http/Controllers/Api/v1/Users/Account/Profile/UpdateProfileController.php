<?php

namespace App\Http\Controllers\Api\v1\Users\Account\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\Account\Profile\UpdateProfileRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class UpdateProfileController extends Controller
{
    public function __invoke(UpdateProfileRequest $request): JsonResponse
    {
        $user = Auth::user();

        $user->update(attributes: $request->validated());

        return sendSuccessResponse(null, __('messages.data-updating'));
    }
}
