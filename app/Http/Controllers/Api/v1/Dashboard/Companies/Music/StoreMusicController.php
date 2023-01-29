<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Companies\Music;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Companies\Music\StoreMusicRequest;
use App\Http\Resources\Dashboard\Companies\Music\MusicResource;
use Domains\Music\Action\StoreMusicAction;
use Illuminate\Http\JsonResponse;

class StoreMusicController extends Controller
{
    public function __invoke(StoreMusicRequest $request): JsonResponse
    {
        $music = (new StoreMusicAction)($request);

        return sendSuccessResponse(MusicResource::make($music), __('messages.data-storing'));
    }
}
