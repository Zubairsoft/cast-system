<?php

namespace App\Http\Controllers\Api\v1\Home\Favorites;

use App\Http\Controllers\Controller;
use App\Models\Music;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class StoreFavoriteController extends Controller
{
    public function __invoke(string $id): JsonResponse
    {
        $userID = Auth::user()->id;

        $music = Music::query()->findOrFail($id);

        $favoriteDate = [
            'user_id' => $userID
        ];

        $music->favorites()->firstOrCreate($favoriteDate, $favoriteDate);

        return sendSuccessResponse(null, __('messages.data-storing'));
    }
}
