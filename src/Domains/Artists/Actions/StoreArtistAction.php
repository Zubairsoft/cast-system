<?php

namespace Domains\Artists\Actions;

use App\Http\Requests\Dashboard\Companies\Artists\StoreArtistRequest;
use App\Models\Artist;
use App\Models\User;
use App\Notifications\Dashboard\Admin\Artists\StoreArtistNotification;
use Domains\Artists\DTO\ArtistData;
use Domains\Helper\Trait\UploadMedia;
use Domains\User\Enums\Role;
use Illuminate\Support\Facades\Auth;

class StoreArtistAction
{
    use UploadMedia;
    public function __invoke(StoreArtistRequest $request): Artist
    {

        $attribute = unsetEmptyParam(ArtistData::fromRequest($request)->toArray());

        $company = Auth::user()->company;
        $artist =  $company->artists()->create($attribute);
        if ($request->image?->isFile()) {
            $artist->image()->create([
                'path' => $this->uploadImage($request->image, 'Artist'),
            ]);
        }
        $user = User::query()->where('role', Role::ADMIN)->first();
        $user->notify(new StoreArtistNotification(
            $company->name,
            $artist->name_ar,
            $artist->name_en,
            $artist->id
        ));
        return $artist;
    }
}
