<?php

namespace Domains\Categories\Presenter;

use Domains\Support\Presenter\NameAttributePresenter;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait CategoryPresenter
{
  use NameAttributePresenter;
    // old way 

    // public function getNameAttribute()
    // {
    //     switch (app()->getLocale()) {
    //         case "en":
    //             return $this->name_en;
    //             break;
    //         case "ar":
    //             return $this->name_ar;
    //             break;
    //         default:
    //             return $this->name_ar;
    //     }
    // }

    // public function getStatusAttribute()
    // {
    //     return $this->is_active ? __('keywords.active') : __('keywords.dis_active');
    // }

    // new way 
    protected function name_en(): Attribute
    {
        return new Attribute(get:function(){
             return strtoupper($this->name_en);
        });
    }



    protected function status(): Attribute
    {
        return new Attribute(get: fn ($value, $attributes) => $attributes['is_active'] ? __('keywords.active') : __('keywords.dis_active'));
    }
}
