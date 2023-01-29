<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Companies\Music;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Companies\Music\UpdateMusicRequest;
use App\Http\Resources\Dashboard\Companies\Music\MusicResource;
use Domains\Music\Action\UpdateMusicAction;
use Illuminate\Http\JsonResponse;

class UpdateMusicController extends Controller
{
    public function __invoke(UpdateMusicRequest $request, string $id): JsonResponse
    {
        $music=(new UpdateMusicAction)($request,$id);

        return sendSuccessResponse(MusicResource::make($music), __('messages.data-updating'));
    }
}
