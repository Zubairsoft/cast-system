<?php

namespace App\Http\Controllers\Api\v1\Home\Favorites;

use App\Http\Controllers\Controller;
use Domains\Home\Actions\Favorites\StoreFavoritesAction;
use Illuminate\Http\JsonResponse;

class StoreFavoriteController extends Controller
{
    public function __invoke(string $id): JsonResponse
    {
        (new StoreFavoritesAction)($id);

        return sendSuccessResponse(null, __('messages.data-storing'));
    }
}
