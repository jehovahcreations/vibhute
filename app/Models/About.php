<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class About extends Eloquent
{
    protected $fillable = [
        'name',
        'decp',
        'image',
        'created_at',
        // add all other fields
    ];
}
