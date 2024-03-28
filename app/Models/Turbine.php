<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turbine extends Model
{
    protected $fillable = [
        'number',
        'description',
        'manufacturer_id',
    ];
}
