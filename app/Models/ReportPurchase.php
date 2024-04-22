<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportPurchase extends Model
{
    protected $fillable = [
        'number',
        'from',
        'to',
        'accepted',
        'cancelled',
        'total_count',
        'total_price',
    ];

    protected $casts = [
        'from' => 'datetime',
        'to' => 'datetime'
    ];
}
