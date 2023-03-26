<?php

namespace App\Models;

use Domains\Global\Traits\Activation;
use Domains\Global\Traits\RegisterEventActivityLog;
use Domains\Music\Presenter\MusicPresenter;
use Domains\Support\Traits\ToggleIsActiveTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Music extends Model
{
    use HasFactory, HasUuids, MusicPresenter, ToggleIsActiveTrait, Activation, RegisterEventActivityLog;

    protected $fillable = [
        'title_ar',
        'title_en',
        'music',
        'album_id',
        'description_ar',
        'description_en',
        'is_active'
    ];

    protected $cast = [
        'album_id' => 'string',
        'is_active' => 'boolean',
    ];

    /**
     * @return BelongsTo
     */
    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }

    /**
     * @return MorphMany
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * @return MorphMany
     */
    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'likable');
    }

    public function scopeActive(Builder $query): Builder
    {
        return  $query->where('is_active', true);
    }

    /**
     * @return MorphMany
     */
    public function favorites(): MorphMany
    {
        return $this->morphMany(favorite::class, 'favoriteable');
    }
}
