<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable=[
        'name_en',
        'name_ar',
        'logo',
        'is_active',
        'category_id'
    ];

    protected $cast=[];
}
