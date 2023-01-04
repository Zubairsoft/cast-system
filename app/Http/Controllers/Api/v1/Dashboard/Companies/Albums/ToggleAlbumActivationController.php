<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Companies\Albums;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class ToggleAlbumActivationController extends Controller
{
    /**
     * Handel the incoming request for toggle activation Albums
     *
     * @param string $id
     * @return JsonResponse
     */
    public function __invoke(string $id): JsonResponse
    {
        $user = Auth::user();

        $album = $user->albums()->findOrFail(id: $id);

        $album->toggleIsActive();

        return sendSuccessResponse(null, __('messages.data-updating'));
    }
}
