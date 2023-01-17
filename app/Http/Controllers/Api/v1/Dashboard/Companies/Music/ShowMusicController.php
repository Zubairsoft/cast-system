<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Companies\Music;

use App\Http\Controllers\Controller;
use App\Models\Music;
use Domains\Music\Action\ShowMusicAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ShowMusicController extends Controller
{
    public function __invoke(string $id): JsonResponse
    {
        $music=(new ShowMusicAction)($id);
        return sendSuccessResponse($music,__('messages.data-getting'));
        
    }
}
