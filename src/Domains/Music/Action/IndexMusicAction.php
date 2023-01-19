<?php

namespace Domains\Music\Action;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexMusicAction 
{
    public function __invoke(Request $request,string $id)
    {
        $sort = $request->input('sort') ?? 'desc';
        $sortBy = $request->input('sortBy') ?? 'created_at';
        $paginate = $request->input('paginate') ?? 15;
        
        $user=Auth::user();

        $album = $user->albums()->findOrFail(id: $id);

        $music = $album->music()->when(
            $request->input('search_text'),
            fn (Builder $builder) =>
            $builder->where('title_ar', 'like', "%{$request->input('search_text')}%")
                ->orWhere('title_en', 'like', "%{$request->input('search_text')}%")
        );

        return $music->orderBy($sortBy,$sort)->paginate($paginate);
    }
}