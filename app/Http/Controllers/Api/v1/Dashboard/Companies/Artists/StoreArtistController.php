<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Companies\Artists;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Companies\Artists\StoreArtistRequest;
use Domains\Artists\Actions\StoreArtistAction;
use Domains\Helper\Trait\UploadMedia;
use Illuminate\Http\JsonResponse;

class StoreArtistController extends Controller
{
    use UploadMedia;
    public function __invoke(StoreArtistRequest $request): JsonResponse
    {
        $artist=(new StoreArtistAction)($request);
        return sendSuccessResponse($artist->load('image'), __('messages.data-storing'));
    }
}
