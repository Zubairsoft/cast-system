<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\Categories\UpdateCategoryRequest;
use App\Http\Resources\Dashboard\Admin\Categories\CategoriesResource;
use Domains\Categories\Action\UpdateCategoryAction;
use Illuminate\Http\JsonResponse;

class UpdateCategoryController extends Controller
{

    /**
     * handel the incoming request for update category
     * 
     * @param UpdateCategoryRequest $request
     * @param string $id
     * 
     * @return JsonResponse
     */
    public function __invoke(UpdateCategoryRequest $request, string $id): JsonResponse
    {
        $category = (new UpdateCategoryAction)($request, $id);

        return sendSuccessResponse(CategoriesResource::make($category), __('messages.data-updating'));
    }
}
