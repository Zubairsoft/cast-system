<?php

namespace App\Models;

use Domains\Categories\Presenter\CategoryPresenter;
use Domains\Support\Traits\ToggleIsActiveTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Category extends Model
{
    use HasFactory, CategoryPresenter, HasUuids, ToggleIsActiveTrait;
    protected $fillable = [
        'name_ar',
        'name_en',
        'is_active'
    ];

    protected $cast = [
        'id' => 'string',
        'is_active' => 'boolean'
    ];

    public function albums(): HasMany
    {
        return $this->hasMany(Album::class);
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    
    ########################### scopes  #####################3
    public function scopeSearch(Builder $query, $text): Builder
    {
        return $query->where(function ($query) use ($text) {
            $query->where('name_en', 'like', $text)
                ->orWhere('name_ar', 'like', $text);
        });
    }
}
