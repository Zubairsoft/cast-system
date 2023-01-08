<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Companies\Albums;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\User;
use App\Notifications\Dashboard\Admin\Albums\DestroyAlbumNotification;
use Domains\User\Enums\Role;
use Illuminate\Http\JsonResponse;

class DestroyAlbumController extends Controller
{

    public function __invoke(string $id): JsonResponse
    {
        $album = Album::query()->findOrFail($id);
        $user = User::query()->where('role', Role::ADMIN)->first();
        $user->notify(new DestroyAlbumNotification(
            $album->creator->company->name,
            $album->name_ar,
            $album->name_en,
            $album->id
        ));
        $album->delete();
        return sendSuccessResponse(null, __('messages.data-deleting'));
    }
}
