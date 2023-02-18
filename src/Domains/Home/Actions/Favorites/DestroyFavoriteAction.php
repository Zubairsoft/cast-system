<?php

namespace Domains\Home\Actions\Favorites;

use App\Models\favorite;

class DestroyFavoriteAction
{
    public function __invoke(string $id, string $favoriteId)
    {
        $favorite = favorite::query()->where('favoriteable_id', $id)->findOrFail($favoriteId);

        $favorite->delete();
    }
}
