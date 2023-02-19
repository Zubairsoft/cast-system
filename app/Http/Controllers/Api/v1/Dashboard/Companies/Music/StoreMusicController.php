<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Companies\Music;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Companies\Music\StoreMusicRequest;
use App\Http\Resources\Dashboard\Companies\Music\MusicResource;
use App\Models\Music;
use Domains\Music\Action\StoreMusicAction;
use Illuminate\Http\JsonResponse;

class StoreMusicController extends Controller
{
    public function __invoke(StoreMusicRequest $request): JsonResponse
    {
        $music = (new StoreMusicAction)($request);

        if (!$music instanceof Music) {

            return sendErrorResponse(null, __('exception.must_be_activated'), 422);
        }

        return sendSuccessResponse(MusicResource::make($music), __('messages.data-storing'));
    }
}
