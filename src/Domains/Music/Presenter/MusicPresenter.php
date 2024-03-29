<?php

namespace Domains\Music\Presenter;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\App;

trait MusicPresenter
{
    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn () =>
            App::currentLocale() === 'ar' ? $this->title_ar : $this->title_en
        );
    }

    protected function description(): Attribute
    {
        return Attribute::make(
            get: fn () =>
            App::currentLocale() === 'ar' ? $this->description_ar : $this->description_en
        );
    }

    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn () =>
            $this->is_active ? __('keywords.active') : __('keywords.dis_active')
        );
    }

    protected function createdAt(): Attribute
    {
        return new Attribute(get: fn () => Carbon::create($this->created_at ?? '2023-01-10')->diffForHumans());
    }
}
