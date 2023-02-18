<?php

namespace App\Http\Controllers\Api\v1\Users\Account\Profile\Favorites;

use App\Http\Controllers\Controller;
use Domains\Home\Actions\Favorites\IndexFavoriteAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IndexFavoriteController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $music = (new IndexFavoriteAction)($request);

        return sendSuccessResponse($music, __('messages.data-getting'));
    }
}
