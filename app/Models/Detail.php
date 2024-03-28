<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $fillable = [
        'number',
        'count',
        'price',
        'description',
        'manufacturer_id',
        'detail_type_id',
    ];
}
