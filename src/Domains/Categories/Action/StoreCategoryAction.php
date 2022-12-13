<?php

namespace Domains\Categories\Action;

use App\Http\Requests\Dashboard\Admin\Categories\StoreCategoryRequest;
use App\Models\Category;
use Domains\Helper\Trait\UploadMedia;

class StoreCategoryAction
{
    use UploadMedia;

    /**
     * @param StoreCategoryRequest $request
     * 
     * @return Category
     */
    public function __invoke(StoreCategoryRequest $request): Category
    {

        $category = Category::create([
            'name_ar' => $request->category_name_ar,
            'name_en' => $request->category_name_en,
            'logo' => $this->uploadImage($request->logo, 'category'),
            'is_active'=>$request->boolean('status')
        ]);

        return $category;
    }
}
