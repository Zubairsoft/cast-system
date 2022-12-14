<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Admin\Categories;

use App\Http\Controllers\Controller;
use Domains\Categories\Action\IndexCategoryAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IndexCategoryController extends Controller
{
    /**
     * handel the incoming request
     * 
     * @param Request $request
     * 
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $query = (new IndexCategoryAction)($request);
        return sendSuccessResponse($query, __('messages.data-getting'));
    }
}
