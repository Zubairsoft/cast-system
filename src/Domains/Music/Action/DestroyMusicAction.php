<?php

namespace Domains\Music\Action;

use App\Models\Music;

class DestroyMusicAction
{
    public function __invoke(string $id): void
    {
        $music = Music::query()->findOrFail(id: $id);
        $music->delete();
    }
}
