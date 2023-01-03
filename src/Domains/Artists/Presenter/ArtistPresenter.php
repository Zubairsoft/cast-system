<?php

namespace Domains\Artists\Presenter;

use Domains\Support\Presenter\NameAttributePresenter;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Carbon;

trait ArtistPresenter
{
    use NameAttributePresenter;

    protected function dateOfBirth():Attribute
    {
        return new Attribute(get:fn($value)=>Carbon::parse($value)->format('Y-m-d'));
    }

}
