<?php

namespace App\Http\Controllers\Api\v1\Users\Account\Profile\Favorites;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Companies\Music\MusicResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexFavoriteController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $sort = $request->input('sort') ?? 'desc';

        $sortBy = $request->input('sortBy') ?? 'created_at';

        $perPage = $request->input('perPage') ?? 10 > 21 ? 10 : $request->input('perPage');

        $user = Auth::user();

        $query = $user->favoritesMusic()->with('album')->orderBy($sortBy, $sort)->paginate($perPage);

        $music=MusicResource::collection($query)->appends($request->query())->toArray();

        return sendSuccessResponse($music,__('messages.data-getting'));
    }
}
