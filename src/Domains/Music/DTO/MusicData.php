<?php

namespace Domains\Music\DTO;

use App\Http\Requests\Dashboard\Companies\music\StoreMusicRequest;
use App\Http\Requests\Dashboard\Companies\Music\UpdateMusicRequest;
use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Data;

class MusicData extends Data
{
    public function __construct(
        public ?string $title_ar,
        public ?string $title_en,
        public ?string $description,
        public ?UploadedFile $music,
        public ?string $album_id,
        public ?bool $is_active
    ) {
    }

    public static function fromRequest(StoreMusicRequest|UpdateMusicRequest $request): self
    {
        return new self(
            $request->post('title_ar'),
            $request->post('title_en'),
            $request->post('description'),
            $request->file('music'),
            $request->post('album'),
            $request->post('is_active')
        );
    }
}
