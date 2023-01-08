<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Companies\Albums;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Companies\Albums\AlbumsResource;
use App\Models\Album;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class IndexAlbumsController extends Controller
{

    /**
     * @param Request $request
     * @param string $categoryId
     * 
     * @return [type]
     */
    public function __invoke(Request $request): JsonResponse
    {
        $perPage = $request->input('perPage') ?? 15;
        $sort = $request->input('sort') ?? 'desc';
        $sortBy = $request->input('sortBy') ?? 'created_at';

        $albums = Album::query()->belongToCompany();

        if (!is_null($request->input('search_text')) && $request->has('search_text')) {
            $search_text = "%{$request->search_text}%";
            $albums->search($search_text);
        }

        return sendSuccessResponse(
            data: AlbumsResource::collection($albums->OrderBy($sortBy, $sort)->paginate($perPage))->appends($request->query())->toArray(),
            msg: __('messages.data-getting')
        );
    }
}
