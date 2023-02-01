<?php

namespace Domains\Music\Action\Likes;

use App\Models\Music;
use Illuminate\Support\Facades\Auth;

class StoreLikeAction
{
    public function __invoke(string $id)
    {
        $userId = Auth::user()->id;

        $music = Music::query()->findOrFail(id: $id);

        $likeData = ['user_id' => $userId];

        $music->likes()->firstOrCreate($likeData, $likeData);
    }
}
