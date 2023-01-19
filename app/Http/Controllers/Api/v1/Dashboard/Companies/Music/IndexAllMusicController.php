<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Companies\Music;

use App\Http\Controllers\Controller;
use App\Models\Music;
use Domains\Music\Action\IndexAllMusicAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexAllMusicController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {

        $query=(new IndexAllMusicAction)($request);

        return sendSuccessResponse($query, __('messages.data-getting'));
    }
}
