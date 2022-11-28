<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Albums\Companies;

use App\Http\Requests\Dashboard\Albums\StoreAlbumRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class StoreAlbumController
{

    public function __invoke(StoreAlbumRequest $request): JsonResponse
    {
        $category = Category::query()->findOrFail($request->category);

        $album = $category->albums()->Create([
            'name_en' => $request->album_name_en,
            'name_ar' => $request->album_name_ar,
            'creator_id' => $request->user()->id,
        ]);

        return sendSuccessResponse($album, __('messages.data-storing'));
    }
}
