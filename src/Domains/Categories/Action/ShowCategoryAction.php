<?php

namespace Domains\Categories\Action;

use App\Models\Category;

class ShowCategoryAction
{
    /**
     * Handel incoming request for handel show category 
     * 
     * @param int $id
     * 
     * @return Category
     */
    public function __invoke(string $id): Category
    {
        $category = Category::query()->with('image')->findOrFail($id);

        return $category;
    }
}
