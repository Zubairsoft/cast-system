<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Admin\Categories;

use App\Http\Controllers\Controller;
use Domains\Categories\Action\ShowCategoryAction;
use Illuminate\Http\JsonResponse;

class ShowCategoryController extends Controller
{
    public function __invoke(int $id) :JsonResponse
    {
        $category=(new ShowCategoryAction)($id);

        return sendSuccessResponse($category,__('messages.data-getting'));
    }
}
