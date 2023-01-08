<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Companies\Albums;

use App\Http\Requests\Dashboard\Companies\Albums\StoreAlbumRequest;
use App\Http\Resources\Dashboard\Companies\Albums\AlbumResource;
use App\Models\Category;
use App\Models\User;
use App\Notifications\Dashboard\Admin\Albums\StoreAlbumNotification;
use Domains\User\Enums\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class StoreAlbumController
{

    public function __invoke(StoreAlbumRequest $request): JsonResponse
    {
        $user = Auth::user();

        $album = $user->albums()->create([
            'name_en' => $request->album_name_en,
            'name_ar' => $request->album_name_ar,
            'category_id' => $request->category,
        ]);

        $company = $user->company;

        $admin = User::query()->where('role', Role::ADMIN)->firstOrFail();


        $admin->notify(new StoreAlbumNotification($company->name, $album->name_ar, $album->name_en, $album->id));
        return sendSuccessResponse(AlbumResource::make($album), __('messages.data-storing'));
    }
}
