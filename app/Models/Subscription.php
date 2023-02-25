<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model
{
    use HasFactory,HasUuids;

    protected $fillable=[
        'ended_at'
    ];

    protected $cast=[
        'end_at'=>'datetime:Y-m-d',
    ];

    public function subscription():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
