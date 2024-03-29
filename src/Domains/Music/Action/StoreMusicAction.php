<?php

namespace Domains\Music\Action;

use App\Http\Requests\Dashboard\Companies\Music\StoreMusicRequest;
use App\Models\Album;
use App\Models\Music;
use App\Models\User;
use App\Notifications\Dashboard\Admin\Music\StoreMusicNotification;
use Domains\Music\DTO\MusicData;
use Domains\User\Enums\Role;
use Illuminate\Http\JsonResponse;

class StoreMusicAction
{
    public function __invoke(StoreMusicRequest $request): Music|JsonResponse
    {
        $album = Album::query()->findOrFail($request->album);

        $attributes = unsetEmptyParam(MusicData::fromRequest($request)->toArray());
        if ($album->is_disabled()) {
            return sendErrorResponse(null, __('exception.must_be_activated'), 422);
        }
        $music = $album->music()->create($attributes);

        $admin = User::query()->where('role', Role::ADMIN)->firstOrFail();
        $admin->notify(new StoreMusicNotification(
            company_name: $album->creator->company->name,
            title_ar: $music->title_ar,
            title_en: $music->title_en,
            music_id: $music->id
        ));
        return $music;
    }
}
