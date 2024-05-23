<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PartRepair extends Model
{
    protected $fillable = [
        'number',
        'price',
        'deadline',
        'note',
        'detail_id',
        'client_id',
        'order_status_id',
        'master_service_id',
        'purchase_item_id'
    ];

    public function detail(): BelongsTo
    {
        return $this->belongsTo(Detail::class);
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
