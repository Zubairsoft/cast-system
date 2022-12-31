<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Admin\Categories\CategoryResource;
use Domains\Categories\Action\ShowCategoryAction;
use Illuminate\Http\JsonResponse;

class ShowCategoryController extends Controller
{
    public function __invoke(string $id): JsonResponse
    {
        $category = (new ShowCategoryAction)(id: $id);

        return sendSuccessResponse(CategoryResource::make($category), __('messages.data-getting'));
    }
}
