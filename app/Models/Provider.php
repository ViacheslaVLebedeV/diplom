<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Provider extends Model
{
    protected $fillable = [
        'name',
        'sku',
        'note'
    ];

    public function purchaseItems(): HasMany
    {
        return $this->hasMany(PurchaseItem::class, 'provider_id');
    }
}
