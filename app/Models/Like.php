<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Like extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
    ];

    protected $cast = [
        'user_id' => 'integer',
    ];

    public function likable(): MorphTo
    {
        return $this->morphTo();
    }
}
