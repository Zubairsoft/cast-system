<?php

namespace Domains\Home\Actions\Favorites;

use App\Models\favorite;
use App\Models\Music;
use Illuminate\Support\Facades\Auth;

class StoreFavoritesAction
{
    public function __invoke(string $id): favorite
    {
        $userID = Auth::user()->id;

        $music = Music::query()->findOrFail($id);

        $favoriteDate = [
            'user_id' => $userID
        ];

        if ($music->is_disabled()) {

            return sendErrorResponse(null, __('exception.must_be_activated'), 422);
        }

        return $music->favorites()->firstOrCreate($favoriteDate, $favoriteDate);
    }
}
