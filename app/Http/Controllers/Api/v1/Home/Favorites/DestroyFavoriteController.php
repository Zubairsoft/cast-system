<?php

namespace App\Http\Controllers\Api\v1\Home\Favorites;

use App\Http\Controllers\Controller;
use Domains\Home\Actions\Favorites\DestroyFavoriteAction;
use Illuminate\Http\JsonResponse;

class DestroyFavoriteController extends Controller
{
    public function __invoke(string $id, string $favoriteId): JsonResponse
    {
        (new DestroyFavoriteAction)($id, $favoriteId);

        return sendErrorResponse(null, __('messages.data-deleting'), 200);
    }
}
