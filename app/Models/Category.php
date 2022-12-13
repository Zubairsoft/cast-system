<?php

namespace App\Models;

use Domains\Categories\Presenter\CategoryPresenter;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory, CategoryPresenter,HasUuids;
    protected $fillable = [
        'name_ar',
        'name_en',
        'logo',
        'is_active'
    ];

    protected $cast = [
        'id' => 'integer',
        'is_active'=>'boolean'
    ];

    public function albums():HasMany
    {
        return $this->hasMany(Album::class);
    }

}
