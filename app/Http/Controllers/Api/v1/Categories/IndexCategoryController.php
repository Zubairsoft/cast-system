<?php

namespace App\Http\Controllers\Api\v1\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IndexCategoryController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $sort = $request->input('sort') ?? 'desc';
        $sortBy= $request->input('sortBy') ?? 'id';

        $query = Category::query();

        if (is_null($request->input('text_search'))) {
            $search_text = "{%$request->input('text_search')%}";

            $query->where(function ($query) use ($search_text) {
                $query->where('name_ar', 'ilike', $search_text)
                    ->orWhere('name_en', 'ilike', $search_text);
            });
        }

        return sendSuccessResponse($query->orderBy($sortBy,$sort)->get(),__('messages.data-getting'));
    }
}
