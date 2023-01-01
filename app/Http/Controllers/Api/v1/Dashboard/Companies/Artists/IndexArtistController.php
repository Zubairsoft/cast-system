<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Companies\Artists;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexArtistController extends Controller
{
    public function __invoke(Request $request): JsonResponse
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

        return sendSuccessResponse(
            $artists->orderBy($sortBy, $sort)->paginate($perPage),
            __('messages.data-getting')
        );
    }
}
