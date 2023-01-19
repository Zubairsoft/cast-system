<?php

namespace App\Models;

use Domains\Support\Traits\ToggleIsActiveTrait;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }
}
