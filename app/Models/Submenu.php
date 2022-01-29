<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Submenu extends Eloquent
{
    protected $fillable = [
        "mainMenu",
        "mainMenuNo",
        "subMenu",
        "subMenuNo",
        "is_Active",
        "icon",
    ];
}
