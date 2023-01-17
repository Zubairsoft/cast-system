<?php

namespace Domains\Music\Action;

use App\Models\Music;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexAllMusicAction
{

    public function __invoke(Request $request)
    {
        $sort = $request->input('sort') ?? 'desc';
        $sortBy = $request->input('sortBy') ?? 'created_at';
        $perPage = $request->input('perPage') ?? 15;

        $userId = Auth::user()->id;

        $query = Music::query()->withWhereHas('album', fn ($query) => $query->where('creator_id', $userId))
            ->when(
                $request->input('search_text'),
                fn (Builder $query) =>
                $query->where('title_ar', 'like', "%{$request->input('search_text')}%")
                    ->orWhere('title_en', 'like', "%{$request->input('search_text')}%")
            )
            ->when(
                $request->input('album'),
                fn (Builder $query) =>
                $query->where('album_id', $request->album)
            )->orderBy($sortBy, $sort)->paginate($perPage);

            return $query;
    }
}