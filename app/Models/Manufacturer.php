<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Manufacturer extends Model
{
    protected $fillable = [
        'name', 'note'
    ];

    public function turbines(): HasMany
    {
        return $this->hasMany(Turbine::class);
    }

    public function details(): HasMany
    {
        return $this->hasMany(Detail::class);
    }


}
