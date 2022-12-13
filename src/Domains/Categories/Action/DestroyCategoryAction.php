<?php

namespace Domains\Categories\Action;

use App\Models\Category;

class DestroyCategoryAction
{
    public function __invoke(int $id): void
    {
        $category = Category::query()->findOrFail($id);
        $category->delete();
    }
}
