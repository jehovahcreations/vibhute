<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Contact extends Eloquent
{
    protected $fillable = [
    'whatsapp',
    'email',
    'facebook',
    'website',
    'address',
    'offer',
    'soffer',
    'gpay',
    'phonepe',
    'paytm',
    'acc',
    'bank',
    'btanch',
    'ifsc',
    'ren',
    'rene',
    'image',

    ];
}
