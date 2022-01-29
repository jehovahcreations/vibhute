<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Newupdate extends Eloquent
{
    protected $fillable = [
        'url',
        //'desc',
        'image',
        // 'created_at',
        // add all other fields
    ];
}
