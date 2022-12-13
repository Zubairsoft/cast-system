<?php

namespace Domains\Companies\Presenter;

use Illuminate\Database\Eloquent\Builder;

trait CompanyPresenter
{

    public function scopeSearchByRepresentative(Builder $query,$name):Builder
    { 
        $nameValue="%{$name}%";
        return $query->whereHas('representative',function(Builder $query)use($nameValue){
            $query->where('name','like',$nameValue);
        });
    }
    
}