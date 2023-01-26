<?php

namespace Domains\Music\Action;

use App\Models\Music;
use App\Models\User;
use App\Notifications\Dashboard\Admin\Music\DestroyMusicNotification;

class DestroyMusicAction
{
    public function __invoke(string $id): void
    {
        $music = Music::query()->findOrFail(id: $id);
        $admin = User::query()->isAdmin()->firstOrFail();

        $admin->notify(new DestroyMusicNotification(
            company_name: $music->album->creator->company->name,
            title_ar: $music->title_ar,
            title_en: $music->title_en
        ));
        
        $music->delete();
    }
}
