<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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



    public function manufacturer(): BelongsTo
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function detailType(): BelongsTo
    {
        return $this->belongsTo(DetailType::class);
    }
}
