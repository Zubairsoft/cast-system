<?php

namespace App\Http\Controllers\Api\v1\Home\Music;

use App\Http\Controllers\Controller;
use App\Http\Resources\Home\Music\MusicCollectionResource;
use App\Models\Album;
use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexMusicController extends Controller
{
    public function __invoke()
    {
        $userId = Auth::user()->id;
        $query = Music::query()->active()->with([
            'album:id,name_ar,name_en,creator_id',
            'album.creator:id,name,username,avatar',
            'comments',
            'comments.user',
        ])
            ->withCount(['comments', 'likes'])
            ->withExists([
                'likes as is_liked' => fn ($builder) => $builder->where('user_id', $userId),
                'favorites as is_favorite' => fn ($builder) => $builder->where('user_id', $userId),
            ])->orderBy('created_at', 'desc')->get();

        $index = MusicCollectionResource::collection($query);

        return sendSuccessResponse($index, __('messages.data-getting'));
    }
}
