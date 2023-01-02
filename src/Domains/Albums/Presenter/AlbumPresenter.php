<?php

namespace Domains\Albums\Presenter;

use Domains\Support\Presenter\NameAttributePresenter;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait AlbumPresenter
{
    use NameAttributePresenter;

    // protected function nameEn(): Attribute
    // {
    //     return new Attribute(get: function () {
    //         return strtoupper($this->name_en) ;
    //     });
    // }



    protected function status():Attribute
    {
        return new Attribute(get:function(){
            return $this->is_active? __('keywords.active'):__('keywords.dis_active');
        });
    }
}
