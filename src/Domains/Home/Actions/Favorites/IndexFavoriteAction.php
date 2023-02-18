<?php

namespace Domains\Home\Actions\Favorites;

use App\Http\Resources\Home\Music\MusicCollectionResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexFavoriteAction
{
    public function __invoke(Request $request)
    {
        $sort = $request->input('sort') ?? 'desc';

        $sortBy = $request->input('sortBy') ?? 'created_at';

        $perPage = $request->input('perPage') ?? 10 > 21 ? 10 : $request->input('perPage');

        $user = Auth::user();

        $query = $user->favoritesMusic()->with('album')->orderBy($sortBy, $sort)->paginate($perPage);

        return MusicCollectionResource::collection($query)->appends($request->query())->toArray();
    }
}
