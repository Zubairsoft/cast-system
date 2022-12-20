<?php

namespace Domains\Categories\Action;

use App\Models\Category;

class DestroyCategoryAction
{
    /**
     * This action handel the delete category 
     * 
     * @param string $id
     * 
     * @return void
     */
    public function __invoke(string $id): void
    {
        $category = Category::query()->findOrFail($id);
        $category->delete();
    }
}
