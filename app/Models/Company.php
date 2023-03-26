<?php

namespace App\Models;

use Domains\Companies\Presenter\CompanyPresenter;
use Domains\Global\Traits\RegisterEventActivityLog;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory, HasUuids, CompanyPresenter, RegisterEventActivityLog;

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

    public function artists(): HasMany
    {
        return $this->hasMany(Artist::class);
    }
}
