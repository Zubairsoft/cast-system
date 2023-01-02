<?php

namespace App\Models;

use Domains\Artists\Presenter\ArtistPresenter;
use Domains\Support\Traits\ToggleIsActiveTrait;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Artist extends Model
{
    use HasFactory, HasUuids,ToggleIsActiveTrait,ArtistPresenter;

    protected $fillable = [
        'name_ar',
        'name_en',
        'is_active',
        'date_of_birth',
        'country',
        'company_id'
    ];

    protected $cast = [
        'is_active' => 'boolean',
    ];

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
