<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Company extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'address',
        'license_document',
        'status',
        'account_type',
        'representative_id',
    ];

    protected $cast = [];

    public function representative(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
