<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class favorite extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
    ];

    public function favoriteable(): MorphTo
    {
        return $this->morphTo();
    }

    protected $cast = [];
}
