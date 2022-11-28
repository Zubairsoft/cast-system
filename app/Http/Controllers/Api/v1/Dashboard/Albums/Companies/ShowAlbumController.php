<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Albums\Companies;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\JsonResponse;

class ShowAlbumController extends Controller
{
    public function __invoke(Album $album): JsonResponse
    {
        return sendSuccessResponse($album, __('messages.data-getting'));
    }
}
