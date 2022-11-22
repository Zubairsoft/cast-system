<?php

namespace Domains\Categories\Presenter;

use Illuminate\Contracts\Database\Eloquent\Builder;

trait CategoryPresenter
{
    public function scopeSearch(Builder $query, $text): Builder
    {
        return $query->where(function ($query) use ($text) {
            $query->where('name_en', 'like', $text)
                ->orWhere('name_ar', 'like', $text);
        });
    }
}
