<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\Categories\StoreCategoryRequest;
use Domains\Categories\Action\StoreCategoryAction;
use Illuminate\Http\JsonResponse;

class StoreCategoryController extends Controller
{
    /**
     * Handel the incoming request for store new category
     * 
     * @param StoreCategoryRequest $request
     * 
     * @return JsonResponse
     */
    public function __invoke(StoreCategoryRequest $request): JsonResponse
    {
        $category = (new StoreCategoryAction)($request);
        return sendSuccessResponse($category, __('messages.data-storing'), 201);
    }
}
