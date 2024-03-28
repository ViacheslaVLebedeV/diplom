<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    protected $fillable = [
        'detail_id',
        'manufacturer_id',
        'purchase_status_id',
        'price',
        'description',
    ];
}
