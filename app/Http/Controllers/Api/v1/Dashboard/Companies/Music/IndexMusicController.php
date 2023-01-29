<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Companies\Music;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Companies\Music\MusicResource;
use Domains\Music\Action\IndexMusicAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IndexMusicController extends Controller
{
  public function __invoke(Request $request, string $id): JsonResponse
  {
    $music = (new IndexMusicAction)($request, $id);
    return sendSuccessResponse(MusicResource::collection($music)->appends($request->query())->toArray(), __('messages.data-getting'));
  }
}
