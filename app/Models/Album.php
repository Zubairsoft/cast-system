<?php

namespace App\Models;

use Domains\Albums\Presenter\AlbumPresenter;
use Domains\Support\Traits\ToggleIsActiveTrait;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Album extends Model
{
    use HasFactory, HasUuids, AlbumPresenter, ToggleIsActiveTrait;

    protected $fillable = [
        'name_en',
        'name_ar',
        'is_active',
        'category_id',
        'creator_id',
    ];

    protected $cast = [
        'is_active' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
