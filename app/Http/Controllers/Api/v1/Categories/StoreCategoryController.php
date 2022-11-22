<?php

namespace App\Http\Controllers\Api\v1\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\StoreCategoryRequest;
use App\Models\Category;
use Domains\Categories\Action\StoreCategoryAction;
use Domains\Helper\Trait\UploadMedia;
use Illuminate\Http\JsonResponse;

class StoreCategoryController extends Controller
{
    use UploadMedia;
    public function __invoke(StoreCategoryRequest $request) :JsonResponse
    {
        $category=(new StoreCategoryAction)($request);

        return sendSuccessResponse($category,__('messages.data-storing'),201);
    }
}
