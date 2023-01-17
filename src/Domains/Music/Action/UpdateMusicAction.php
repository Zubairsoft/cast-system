<?php

namespace Domains\Music\Action;

use App\Http\Requests\Dashboard\Companies\Music\UpdateMusicRequest;
use App\Models\Music;
use Domains\Music\DTO\MusicData;

class UpdateMusicAction
{
    public function __invoke(UpdateMusicRequest $request, string $id): Music
    {
        $music = Music::query()->findOrFail(id: $id);

        $attributes = unsetEmptyParam(MusicData::fromRequest($request)->toArray());

        $music->update($attributes);

        return $music;
    }
}
