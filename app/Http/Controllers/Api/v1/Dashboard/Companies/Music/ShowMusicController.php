<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Companies\Music;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Companies\Music\MusicResource;
use Domains\Music\Action\ShowMusicAction;
use Illuminate\Http\JsonResponse;

class ShowMusicController extends Controller
{
    public function __invoke(string $id): JsonResponse
    {
        $music = (new ShowMusicAction)($id);
        return sendSuccessResponse(MusicResource::make($music), __('messages.data-getting'));
    }
}
