<?php

namespace App\Models;

use Domains\Albums\Presenter\AlbumPresenter;
use Domains\Global\Traits\Activation;
use Domains\Support\Traits\ToggleIsActiveTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Facades\Auth;

class Album extends Model
{
    use HasFactory, HasUuids, AlbumPresenter, ToggleIsActiveTrait, Activation;

    protected $fillable = [
        'name_en',
        'name_ar',
        'is_active',
        'category_id',
        'creator_id',
    ];

    protected $cast = [
        'is_active' => 'boolean',
        'creator_id' => 'integer',
        'category_id' => 'string',
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

    public function music(): HasMany
    {
        return $this->hasMany(Music::class);
    }

    ########################## scopes #############################################

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
