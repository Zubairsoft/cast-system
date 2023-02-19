<?php

namespace App\Http\Controllers\Api\v1\Home\Favorites;

use App\Http\Controllers\Controller;
use App\Models\favorite;
use Domains\Home\Actions\Favorites\StoreFavoritesAction;
use Illuminate\Http\JsonResponse;

class StoreFavoriteController extends Controller
{
    public function __invoke(string $id): JsonResponse
    {
        $favorite = (new StoreFavoritesAction)($id);

        if (!$favorite instanceof favorite) {
            return sendErrorResponse(null, __('exception.must_be_activated'));
        }

        return sendSuccessResponse(null, __('messages.data-storing'));
    }
}
