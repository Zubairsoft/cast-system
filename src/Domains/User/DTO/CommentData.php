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

    public static function fromRequest( $request): self
    {
        return new self(
            $request->post('comment')
        );
    }

    public static function imageMap( $request, string $path): Collection
    {
        return collect($request->images)
            ->map(function ($file) use ($path) {
                return [
                    'path' => $file->storePublicly($path)
                ];
            });
    }
}
