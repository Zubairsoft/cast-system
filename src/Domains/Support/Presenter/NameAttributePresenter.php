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

    protected function status():Attribute
    {
        return new Attribute(get: function(){
            return $this->is_active ? __('keywords.active'):__('keywords.dis_active');
        });
    }
}
