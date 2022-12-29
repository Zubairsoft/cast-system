<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Companies\Albums;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Companies\Albums\UpdateAlbumRequest;
use App\Http\Resources\Dashboard\Companies\Albums\AlbumResource;
use App\Models\Album;
use Illuminate\Http\JsonResponse;

class UpdateAlbumController extends Controller
{

    public function __invoke(UpdateAlbumRequest $request, Album $album): JsonResponse
    {
        $album->update($request->validated());

        return sendSuccessResponse(AlbumResource::make($album), __('messages.data-updating'));
    }
}
