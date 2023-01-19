<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Companies\Music;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Companies\Music\UpdateMusicRequest;
use App\Models\Music;
use Domains\Music\Action\UpdateMusicAction;
use Domains\Music\DTO\MusicData;
use Illuminate\Http\JsonResponse;

class UpdateMusicController extends Controller
{
    public function __invoke(UpdateMusicRequest $request, string $id): JsonResponse
    {
        $music=(new UpdateMusicAction)($request,$id);

        return sendSuccessResponse($music, __('messages.data-updating'));
    }
}
