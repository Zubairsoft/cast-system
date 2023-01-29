<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Companies\Artists;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Companies\Artists\StoreArtistRequest;
use App\Http\Resources\Dashboard\Companies\Artists\ArtistResource;
use Domains\Artists\Actions\StoreArtistAction;
use Illuminate\Http\JsonResponse;

class StoreArtistController extends Controller
{
    public function __invoke(StoreArtistRequest $request): JsonResponse
    {
        $artist = (new StoreArtistAction)($request);
        return sendSuccessResponse(ArtistResource::make($artist->load('image')), __('messages.data-storing'));
    }
}
