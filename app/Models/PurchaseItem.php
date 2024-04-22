<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PurchaseItem extends Model
{
    protected $fillable = [
        'number',
        'detail_id',
        'manufacturer_id',
        'purchase_status_id',
        'provider_id',
        'count',
        'price',
        'note',
    ];

    public function detail(): BelongsTo
    {
        return $this->belongsTo(Detail::class);
    }

    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class);
    }

    public function purchaseStatus(): BelongsTo
    {
        return $this->belongsTo(PurchaseStatus::class);
    }

    public function partRepairs(): HasMany
    {
        return $this->hasMany(PartRepair::class, 'purchase_item_id');
    }

    public function turbineRepairs(): HasMany
    {
        return $this->hasMany(TurbineRepair::class, 'purchase_item_id');
    }
}
