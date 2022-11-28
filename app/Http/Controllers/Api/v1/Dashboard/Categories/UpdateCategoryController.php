<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\UpdateCategoryRequest;
use Domains\Categories\Action\UpdateCategoryAction;

class UpdateCategoryController extends Controller
{

    public function __invoke(UpdateCategoryRequest $request, int $id)
    {      
        $category=(new UpdateCategoryAction)($request,$id);

        return sendSuccessResponse($category,__('messages.data-updating'));
    }
}
