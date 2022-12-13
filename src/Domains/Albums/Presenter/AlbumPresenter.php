<?php

namespace Domains\Albums\Presenter;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

trait AlbumPresenter
{

    public function scopeBelongTOCompany(Builder $query): Builder
    {
        $company = Auth::user();
        return $query->where('creator_id', $company->id);
    }

    public function scopeSearch(Builder $query, $value): Builder
    {
        return $query->where(function ($query) use ($value) {
            $query->where('name_ar', 'like', $value)
                ->orWhere('name_en', 'like', $value);
        });
    }
}
