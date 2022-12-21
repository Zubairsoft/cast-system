<?php

namespace App\Models;

use Domains\Categories\Presenter\CategoryPresenter;
use Domains\Support\Traits\ToggleIsActiveTrait;
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
        'id' => 'integer',
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
}
