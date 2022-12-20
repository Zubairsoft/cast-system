<?php

namespace Domains\Categories\Action;

use App\Models\Category;
use illuminate\Http\Request;

class IndexCategoryAction
{
    /**
     * Handel the incoming request
     * 
     * @param Request $request
     * 
     * @return Category
     */
    public function __invoke(Request $request): Category
    {
        $perPage = $request->input('perPage') ?? 15;
        $sort = $request->input('sort') ?? 'desc';
        $sortBy = $request->input('sortBy') ?? 'id';

        $query = Category::query();

        if ($request->input('text_search') && !is_null($request->input('text_search'))) {
            $search_text = "%{$request->input('text_search')}%";
            $query->search($search_text);
        }

        return $query->orderBy($sortBy, $sort)->with('image')->paginate($perPage);
    }
}
