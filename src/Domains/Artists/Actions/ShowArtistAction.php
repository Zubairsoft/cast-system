<?php

namespace Domains\Artists\Actions;

use App\Models\Artist;
use Illuminate\Support\Facades\Auth;

class ShowArtistAction
{
    public function __invoke(string $id): Artist
    {
        $company = Auth::user()->company;
        $artist = $company->artists()->findOrFail($id);
        return $artist;
    }
}
