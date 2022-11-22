<?php

namespace Domains\Categories\Action;

use App\Models\Category;
use illuminate\Http\Request;

class IndexCategoryAction
{
    public function __invoke(Request $request)
    {
        $perPage=$request->input('perPage')??15;
        $sort = $request->input('sort') ?? 'desc';
        $sortBy = $request->input('sortBy') ?? 'id';

        $query = Category::query();

        if ($request->has('text_search') && !is_null($request->input('text_search'))) {
            $search_text = "%{$request->input('text_search')}%";
            $query->search($search_text);
        }

        return $query->orderBy($sortBy, $sort)->paginate($perPage);
    }
}
