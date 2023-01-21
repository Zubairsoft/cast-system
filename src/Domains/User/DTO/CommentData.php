<?php

namespace Domains\User\DTO;

use App\Http\Requests\Users\Comments\StoreCommentRequest;
use Spatie\LaravelData\Data;

class CommentData extends Data
{
    public function __construct(
        public ?string $comment,
    ) {
    }

    public static function fromRequest(StoreCommentRequest $request)
    {
        return new self(
            $request->post('comment')
        );
    }
}
