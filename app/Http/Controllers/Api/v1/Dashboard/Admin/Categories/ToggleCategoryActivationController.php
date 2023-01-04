<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ToggleCategoryActivationController extends Controller
{
  public function __invoke(string $id):JsonResponse
  {
    $category=Category::query()->find(id:$id);
    $category->toggleIsActive();
    return sendSuccessResponse(null,__('messages.data-updating'));
  }
}
