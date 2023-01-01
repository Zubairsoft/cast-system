<?php

namespace Domains\Artists\Actions;

use App\Http\Requests\Dashboard\Companies\Artists\UpdateArtistRequest;
use Domains\Artists\DTO\ArtistData;
use Domains\Helper\Trait\UploadMedia;
use Illuminate\Support\Facades\Auth;

class UpdateArtistAction
{
    use UploadMedia;

    public function __invoke(UpdateArtistRequest $request, string $id): void
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
    }
}
