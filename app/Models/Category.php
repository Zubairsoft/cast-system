<?php

namespace App\Models;

use Domains\Categories\Presenter\CategoryPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, CategoryPresenter;
    // TODO update name ar later
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

}
