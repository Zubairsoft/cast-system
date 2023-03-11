<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactUs extends Model
{
    use HasFactory,HasUuids;

    protected $fillable=[
        'sender',
        'email',
        'phone',
        'message',
        'problem',
        'status',
        'contact_list_id'
    ];


    protected $cast=[];

    public function contactList():BelongsTo
    {
        return $this->belongsTo(ContactList::class);
    }
}
