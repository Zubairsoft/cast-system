<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Albums\Companies;

use App\Http\Controllers\Controller;
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
        $sortBy = $request->input('sortBy') ?? 'id';

        $albums = Album::query()->belongToCompany();

        if (! is_null($request->input('search_text')) && $request->has('search_text')) {
            $search_text = "%{$request->search_text}%";
          $albums->search($search_text);
        }

        return sendSuccessResponse($albums->OrderBy($sortBy, $sort)->paginate($perPage), __('messages.data-getting'));
    }
}
