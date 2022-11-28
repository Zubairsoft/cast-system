<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Albums\Companies;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Albums\UpdateAlbumRequest;
use App\Models\Album;
use Illuminate\Http\JsonResponse;

class UpdateAlbumController extends Controller
{

    public function __invoke(UpdateAlbumRequest $request, Album $album): JsonResponse
    {
        $album->update($request->validated());

        return sendSuccessResponse($request, __('messages.data-updating'));
    }
}
