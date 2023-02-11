<?php

namespace App\Http\Controllers\Api\v1\Home\Likes;

use App\Http\Controllers\Controller;
use Domains\Music\Action\Likes\StoreLikeAction;
use Illuminate\Http\JsonResponse;

class StoreLikeController extends Controller
{
    public function __invoke(string $id): JsonResponse
    {
        (new StoreLikeAction)(id: $id);
        return sendSuccessResponse(null, __('messages.data-storing'));
    }
}
