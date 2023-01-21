<?php

namespace Domains\User\DTO;

use App\Http\Requests\Users\Comments\StoreCommentRequest;
use Domains\Helper\Trait\UploadMedia;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;


class CommentData extends Data
{
    public function __construct(
        public ?string $comment,
    ) {
    }

    public static function fromRequest(StoreCommentRequest $request): self
    {
        return new self(
            $request->post('comment')
        );
    }

    public static function imageMap(StoreCommentRequest $request, string $path): Collection
    {
        return collect($request->images)
            ->map(function ($file) use ($path) {
                return [
                    'path' => $file->storePublicly($path)
                ];
            });
    }
}
