<?php

namespace Domains\Albums\Presenter;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait AlbumPresenter
{

    protected function name_en(): Attribute
    {
        return new Attribute(get: function () {
            return strtoupper($this->name_en) ;
        });
    }

    protected function name(): Attribute
    {
        return new Attribute(get: function () {
            return app()->getLocale() === 'ar' ? $this->name_ar : strtoupper($this->name_en);
        });
    }

    protected function status():Attribute
    {
        return new Attribute(get:function(){
            return $this->is_active? __('keywords.active'):__('keywords.dis_active');
        });
    }
}
