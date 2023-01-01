<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Companies\Artists;

use App\Http\Controllers\Controller;
use Domains\Artists\Actions\ShowArtistAction;
use Illuminate\Http\JsonResponse;

class ShowArtistController extends Controller
{
    public function __invoke(string $id): JsonResponse
    {
        $artist=(new ShowArtistAction)($id);

        return sendSuccessResponse(
            $artist->load('image'),
            __('messages.data-getting')
        );
    }
}
