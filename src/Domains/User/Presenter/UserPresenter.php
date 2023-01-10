<?php

namespace Domains\User\Presenter;

use Domains\Helper\Trait\UploadMedia;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isEmpty;

trait UserPresenter
{
    use UploadMedia;
    protected function password(): Attribute
    {
        return new Attribute(set: fn ($value) => Hash::make($value));
    }

    protected function avatar(): Attribute
    {
        return new Attribute(
            get: fn ($value) => empty($value) ? 'Users/avatar/default.png' : Storage::url($value),
            set: fn ($value) => $this->uploadImage($value, 'Users/avatar')
        );
    }
}
