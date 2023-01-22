<?php

namespace App\Http\Controllers\Api\v1\Users\Music\Comments;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\Music\Comments\StoreCommentRequest;
use App\Models\Music;
use Domains\User\DTO\CommentData;
use Illuminate\Http\JsonResponse;

class StoreCommentController extends Controller
{
    /**
     * Handle the incoming request for store comment
     * 
     * @param StoreCommentRequest $request
     * @param string $id
     * 
     * @return JsonResponse
     */
    public function __invoke(StoreCommentRequest $request, string $id): JsonResponse
    {
        $attributes = CommentData::fromRequest($request)->toArray();

        $music = Music::query()->findOrFail(id: $id);

        if (!$music->is_active) {

            return sendErrorResponse(null, __('exception.prevent_add_comment'), 422);
        }

        $comment = $music->comments()->create(
            $attributes + [
                'user_id' => $request->user()->id,
            ]
        );

        if ($request->hasFile('images')) {
            $images = CommentData::imageMap($request, 'Music/' . $music->id . '/Comments');
            $comment->images()->createMany($images);
        }

        return sendSuccessResponse($comment, __('exception.prevent_add_comment'));
    }
}
