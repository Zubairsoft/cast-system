<?php

namespace App\Http\Controllers\Api\v1\Users\Music\Comments;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Companies\Music\UpdateMusicRequest;
use App\Models\Music;
use Domains\User\DTO\CommentData;
use Illuminate\Http\JsonResponse;

class UpdateCommentController extends Controller
{

    public function __invoke(UpdateMusicRequest $request, string $id, string $commentId): JsonResponse
    {
        $attributes = unsetEmptyParam(CommentData::fromRequest($request)->toArray());

        $music = Music::query()->findOrFail(id: $id);

        $comment = $music->comments()->findOrFail(id: $commentId);

        $comment->update($attributes);

        if ($request->has('images')) {
            $images = CommentData::imageMap($request, 'Music/' . $music->id . '/Comments');

         }

        return sendSuccessResponse($comment, __('messages.data-updating'));
    }
}
