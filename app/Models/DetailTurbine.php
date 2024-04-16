<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailTurbine extends Model
{
    protected $fillable = [
        'detail_id',
        'turbine_id',
        'note',
    ];

    public function detail(): BelongsTo
    {
        return $this->belongsTo(Detail::class);
    }

    public function turbine(): BelongsTo
    {
        return $this->belongsTo(Turbine::class);
    }

    use HasFactory;
}
