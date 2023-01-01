<?php

namespace Domains\Artists\Actions;

use App\Models\Artist;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexArtistAction
{

    public function __invoke(Request $request)
    {
        $perPage = $request->perPage ?? 15;
        $sort = $request->sort ?? 'desc';
        $sortBy = $request->sortBy ?? 'created_at';
        $companyId = Auth::user()->company->id;
        $artists = Artist::query()->where('company_id', $companyId)
            ->when(
                $request->input('search_text'),
                fn (Builder $query) =>
                $query->where('name_en', 'like', "%{$request->input('search_text')}%")
                    ->orWhere('name_en', 'like', "{$request->input('search_text')}")
            );

        return $artists->orderBy($sortBy, $sort)->paginate($perPage);
    }
}
