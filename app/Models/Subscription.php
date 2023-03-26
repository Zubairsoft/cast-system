<?php

namespace App\Models;

use Domains\Global\Traits\RegisterEventActivityLog;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model
{
    use HasFactory, HasUuids, RegisterEventActivityLog;

    protected $fillable = [
        'started_at',
        'ended_at'
    ];

    protected $cast = [
        'started_at' => 'datetime:Y-m-d',
        'end_at' => 'datetime:Y-m-d'
    ];

    public function subscription(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
