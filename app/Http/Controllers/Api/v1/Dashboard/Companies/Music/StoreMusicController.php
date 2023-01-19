<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Companies\Music;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Companies\music\StoreMusicRequest;
use Domains\Music\Action\StoreMusicAction;
use Illuminate\Http\JsonResponse;

class StoreMusicController extends Controller
{
    public function __invoke(StoreMusicRequest $request): JsonResponse
    {
    $music=(new StoreMusicAction)($request);

        return sendSuccessResponse($music, __('messages.data-storing'));
    }
}
