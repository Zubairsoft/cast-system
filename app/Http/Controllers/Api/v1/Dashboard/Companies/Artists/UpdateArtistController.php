<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Companies\Artists;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Companies\Artists\UpdateArtistRequest;
use Domains\Artists\DTO\ArtistData;
use Domains\Helper\Trait\UploadMedia;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateArtistController extends Controller
{
    use UploadMedia;

    public function __invoke(UpdateArtistRequest $request, string $id): JsonResponse
    {
        $attributes = unsetEmptyParam(ArtistData::fromRequest($request)->toArray());

        $company = Auth::user()->company;
        $artist = $company->artists()->findOrFail($id);
        $artist->update($attributes);

        if ($request->image?->isFile()) {
            $artist->image()->update(
                ['path' => $this->uploadImage($request->image, 'Artist')]
            );
        }

        return sendSuccessResponse(null, __('messages.data-updating'));
    }
}
