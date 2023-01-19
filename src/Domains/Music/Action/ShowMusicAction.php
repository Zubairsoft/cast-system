<?php

namespace Domains\Music\Action;

use App\Models\Music;

class ShowMusicAction
{
    public function __invoke(string $id): Music
    {
        return Music::query()->findOrFail($id);
    }
}
