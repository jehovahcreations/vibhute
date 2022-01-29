<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class Banner extends Eloquent
{
    protected $fillable = [
        'name',
        'image',
        'is_Active',

        // add all other fields
    ];
}
