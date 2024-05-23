<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MasterService extends Model
{
    protected $fillable = [
        'name',
        'price',
    ];

    public function turbineRepairs(): HasMany
    {
        return $this->hasMany(TurbineRepair::class);
    }

    public function partRepairs(): HasMany
    {
        return $this->hasMany(PartRepair::class, 'master_service_id');
    }

}
