<?php

namespace App\Http\Controllers\Api\v1\Users\Music\Comments;

use App\Http\Controllers\Controller;
use App\Models\Music;
use Illuminate\Http\JsonResponse;

class DestroyCommentController extends Controller
{
    public function __invoke(string $id, string $commentId): JsonResponse
    {
        $music = Music::query()->findOrFail(id: $id);

        $comment = $music->comments()->findOrFail(id: $commentId);

        $comment->delete();

        return sendSuccessResponse(null, __('messages.data-deleting'));
    }
}
