<?php

namespace Domains\Categories\Action;

use App\Models\Category;

class ShowCategoryAction
{
    /**
     * @param int $id
     * 
     * @return Category
     */
    public function __invoke(int $id): Category
    {
        $category = Category::query()->findOrFail($id);

        return $category;
    }
}
