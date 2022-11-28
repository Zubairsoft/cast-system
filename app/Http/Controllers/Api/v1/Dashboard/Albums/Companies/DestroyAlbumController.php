<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Albums\Companies;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\JsonResponse;

class DestroyAlbumController extends Controller
{

    public function __invoke(int $id): JsonResponse
    {
        $album = Album::query()->findOrFail($id);
        $album->delete();
        return sendSuccessResponse(null, __('messages.data-deleting'));
    }
}
