<?php

namespace Domains\Music\Action;

use App\Http\Requests\Dashboard\Companies\music\StoreMusicRequest;
use App\Models\Album;
use App\Models\Music;
use Domains\Music\DTO\MusicData;

class StoreMusicAction
{
    public function __invoke(StoreMusicRequest $request): Music
    {
        $album = Album::query()->findOrFail($request->album);
        $attributes = unsetEmptyParam(MusicData::fromRequest($request)->toArray());
        $music = $album->music()->create($attributes);
        return $music;
    }
}
