<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Companies\Artists;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Companies\Artists\StoreArtistRequest;
use Domains\Artists\DTO\ArtistData;
use Domains\Helper\Trait\UploadMedia;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class StoreArtistController extends Controller
{
    use UploadMedia;
    public function __invoke(StoreArtistRequest $request): JsonResponse
    {
        $attribute = unsetEmptyParam(ArtistData::fromRequest($request)->toArray());

        $company = Auth::user()->company;
        $artist =  $company->artists()->create($attribute);
        if ($request->image?->isFile()) {
            $artist->image()->create([
                'path' => $this->uploadImage($request->image, 'Artist'),
            ]);
        }

        return sendSuccessResponse($artist, __('messages.data-storing'));
    }
}
