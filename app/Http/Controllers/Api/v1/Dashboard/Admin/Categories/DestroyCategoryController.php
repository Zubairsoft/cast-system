<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Domains\Categories\Action\DestroyCategoryAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DestroyCategoryController extends Controller
{
    
    public function __invoke(int $id):JsonResponse
    {
        (new DestroyCategoryAction)($id);
        return sendSuccessResponse(null,__('messages.data-deleting'));
    }
}
