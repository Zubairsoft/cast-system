<?php

namespace App\Http\Controllers\Api\v1\Home\Likes;

use App\Http\Controllers\Controller;
use Domains\Music\Action\Likes\DestroyLikeAction;
use Illuminate\Http\JsonResponse;

class DestroyLikeController extends Controller
{
    public function __invoke(string $id): JsonResponse
    {
        (new DestroyLikeAction)($id);
        return sendSuccessResponse(null . __('messages.data-deleting'));
    }
}
