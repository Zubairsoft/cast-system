<?php

namespace Domains\Categories\Action;

use App\Http\Requests\Dashboard\Admin\Categories\UpdateCategoryRequest;
use App\Models\Category;
use Domains\Helper\Trait\UploadMedia;

class UpdateCategoryAction
{
    use UploadMedia;

    /**
     * Handel the incoming request for Update category
     * 
     * @param UpdateCategoryRequest $request
     * @param string $id
     * 
     * @return Category
     */
    public function __invoke(UpdateCategoryRequest $request, string $id): Category
    {
        $category = Category::query()->findOrFail($id);
        $category->name_en = $request->input('category_name_en') ??  $category->name_en;
        $category->name_ar = $request->input('category_name_ar') ??  $category->name_ar;
        $category->is_active = $request->boolean('status') ??  $category->is_active;
        if (is_file($request->logo)) {
            $category->image()->update(['path' => $this->uploadImage($request->logo, 'Category/logo')]);
        }
        $category->save();

        return $category;
    }
}
