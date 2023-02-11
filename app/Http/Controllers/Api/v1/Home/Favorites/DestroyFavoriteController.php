<?php

namespace App\Http\Controllers\Api\v1\Home\Favorites;

use App\Http\Controllers\Controller;
use App\Models\favorite;
use Illuminate\Http\JsonResponse;

class DestroyFavoriteController extends Controller
{
    public function __invoke(string $id, string $favoriteId): JsonResponse
    {
        $favorite=favorite::query()->where('favoriteable_id',$id)->findOrFail($favoriteId);

        $favorite->delete();

        return sendErrorResponse(null,__('messages.data-deleting'),200);
    }
}
