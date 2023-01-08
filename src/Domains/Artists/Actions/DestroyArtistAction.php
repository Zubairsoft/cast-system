<?php

namespace  Domains\Artists\Actions;

use App\Models\User;
use App\Notifications\Dashboard\Admin\Artists\DestroyArtistNotification;
use Domains\User\Enums\Role;
use Illuminate\Support\Facades\Auth;

class DestroyArtistAction
{
    public function __invoke(string $id): void
    {
        $company = Auth::user()->company;
        $artist = $company->artists()->findOrFail($id);
        $admin = User::query()->where('role', Role::ADMIN)->first();
        $admin->notify(new DestroyArtistNotification($company->name, $artist->name_ar, $artist->name_en, $artist->id));
        $artist->delete();
    }
}
