<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Companies\Albums;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Companies\Albums\AlbumResource;
use App\Models\Album;
use Illuminate\Http\JsonResponse;

class ShowAlbumController extends Controller
{
    public function __invoke(Album $album): JsonResponse
    {
        return sendSuccessResponse(AlbumResource::make($album), __('messages.data-getting'));
    }
}
