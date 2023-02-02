<?php

namespace Domains\Music\Action\Likes;

use App\Models\Music;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class DestroyLikeAction
{
    public function __invoke(string $id): void
    {
        $user = Auth::user();

        $like = $user->likeCreator()->where(fn (Builder $query) =>
        $query->where('likable_id', $id)->where('likable_type', Music::class))
            ->firstOrFail();

        $like->delete();
    }
}
