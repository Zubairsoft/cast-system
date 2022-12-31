<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Companies\Albums;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\JsonResponse;

class DestroyAlbumController extends Controller
{

    public function __invoke(string $id): JsonResponse
    {
        $album = Album::query()->findOrFail($id);
        $album->delete();
        return sendSuccessResponse(null, __('messages.data-deleting'));
    }
}
