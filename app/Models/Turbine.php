<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Turbine extends Model
{
    protected $fillable = [
        'number',
        'note',
        'manufacturer_id',
    ];

    public function manufacturer(): BelongsTo
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function turbineRepairs(): HasMany
    {
        return $this->hasMany(TurbineRepair::class, 'turbine_id');
    }

//    public function details(): BelongsToMany
//    {
//        return $this->belongsToMany(Detail::class)->withPivot(['note']);
//    }
}
