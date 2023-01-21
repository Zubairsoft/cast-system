<?php

namespace App\Http\Controllers\Api\v1\Users\Comments;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\Comments\StoreCommentRequest;
use App\Models\Music;
use Domains\User\DTO\CommentData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoreCommentController extends Controller
{
    public function __invoke(StoreCommentRequest $request): JsonResponse
    {
        $attributes = unsetEmptyParam(CommentData::fromRequest($request)->toArray());

        $music = Music::query()->findOrFail($request->music);

        if(!$music->is_active){
          return sendErrorResponse(null,__('exception.prevent_add_comment'),422);
        }

        $comment = $music->comments()->create(
            $attributes +
                [
                    'user_id' => $request->user()->id,
                ]
        );

        return sendSuccessResponse($comment, __('messages.data-storing'));
    }
}
