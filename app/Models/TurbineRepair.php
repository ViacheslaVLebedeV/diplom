<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $array)
 */
class TurbineRepair extends Model
{
    protected $fillable = [
        'number',
        'price',
        'deadline',
        'note',
        'turbine_id',
        'client_id',
        'order_status_id',
        'master_service_id',
        'purchase_item_id'
    ];

    protected $casts = [
        'deadline' => 'datetime'
    ];

    public function turbine(): BelongsTo
    {
        return $this->belongsTo(Turbine::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function orderStatus(): BelongsTo
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public function masterService(): BelongsTo
    {
        return $this->belongsTo(MasterService::class);
    }

    public function purchaseItem(): BelongsTo
    {
        return $this->belongsTo(PurchaseItem::class);
    }
}
