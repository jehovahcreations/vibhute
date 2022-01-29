<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Mainmenu extends Eloquent
{
    protected $fillable = [
        "menuName",
        "icon",
        "menuNumber",
    ];
}
