<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Comboexpert extends Eloquent
{
protected $fillable = [
    "mainMenu",
    "mainMenuNo",
    "subMenu",
    "subMenuNo",
    "MinimumAgeatEntry",
    "MaximumAgeatEntry",
    "MaximumMaturityAge",
    "PolicyTerm",
    "MinimumSumAssured",
    "MaximumSumAssured",
    "PremiumMode",
    "RidersAvailable",
    "SurrenderValue",
    "LoanAvailable",
    "OtherBenefit",
    "name",
    "image", 
    "pdf",
    "plan",
    ];
}

    
