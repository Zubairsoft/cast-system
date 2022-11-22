<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Album extends Model
{
    use HasFactory,HasUuids;

    protected $fillable=[
        'name_en',
        'name_ar',
        'is_active',
        'category_id',
        'creator_id'
    ];

    protected $cast=[];

    public function category():BelongsTo
    {
     return $this->belongsTo(Category::class);   
    }

    public function creator():BelongsTo
    {
     return $this->belongsTo(User::class);   
    }
}
