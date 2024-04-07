<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderStatus extends Model
{
    protected $fillable = [
        'name'
    ];

    public function partRepairs(): HasMany
    {
        return $this->hasMany(PartRepair::class, 'order_status_id');
    }

    public function turbineRepairs(): HasMany
    {
        return $this->hasMany(TurbineRepair::class, 'order_status_id');
    }
}
