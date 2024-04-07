<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Detail extends Model
{
    protected $fillable = [
        'number',
        'count',
        'note',
        'manufacturer_id',
        'detail_type_id',
    ];



    public function manufacturer(): BelongsTo
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function detailType(): BelongsTo
    {
        return $this->belongsTo(DetailType::class);
    }

    public function purchaseItems(): HasMany
    {
        return $this->hasMany(PurchaseItem::class);
    }

    public function partRepairs(): HasMany
    {
        return $this->hasMany(PartRepair::class, 'detail_id');
    }
}
