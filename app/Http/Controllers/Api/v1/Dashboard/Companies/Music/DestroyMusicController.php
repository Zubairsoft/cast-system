<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Companies\Music;

use App\Http\Controllers\Controller;
use App\Models\Music;
use Domains\Music\Action\DestroyMusicAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DestroyMusicController extends Controller
{
    //
    public function __invoke(string $id): JsonResponse
    {
       (new DestroyMusicAction)($id);
        return sendSuccessResponse(null,__('messages.data-deleting'));
    }
}
