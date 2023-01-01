<?php

namespace  Domains\Artists\Actions;

use Illuminate\Support\Facades\Auth;

class DestroyArtistAction
{
    public function __invoke(string $id): void
    {
        $company = Auth::user()->company;
        $artist = $company->artists()->findOrFail($id);
        $artist->delete();
    }
}
