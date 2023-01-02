<?php

namespace Domains\Support\Presenter;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait NameAttributePresenter
{
    protected function name(): Attribute
    {
        return new Attribute(get: function () {
            return app()->getLocale() === "ar" ? $this->name_ar : $this->name_en;
        });
    }
}
