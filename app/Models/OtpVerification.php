<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Domains\User\Trait\Otp\OtpActivation;

class OtpVerification extends Model
{
    use HasFactory,OtpActivation;

    protected $fillable = [
        'email',
        'otp'
    ];

    protected $cast = [];

       
}
