<?php

namespace App\Http\Controllers\Api\v1\Users\Account\Profile;

use App\Http\Controllers\Controller;
use App\Http\Resources\Users\Accounts\Profile\ProfileResource;
use Auth;
use Domains\User\Action\Profile\ProfileAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $user = (new ProfileAction)();
        return sendSuccessResponse(ProfileResource::make($user->loadCount('favoritesMusic as favorite_counts')), __('messages.data-getting'));
    }
}
