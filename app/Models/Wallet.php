<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
    ];

    protected $cast = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    const DEFAULT_SORTED_BY = 'created_at';

    const DEFAULT_SORTED = 'desc';

}
