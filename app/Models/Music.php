<?php

namespace App\Models;

use Domains\Support\Traits\ToggleIsActiveTrait;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Music extends Model
{
    use HasFactory, HasUuids, ToggleIsActiveTrait;

    protected $fillable = [
        'title_ar',
        'title_en',
        'music',
        'album_id',
        'description',
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
}
