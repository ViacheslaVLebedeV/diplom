<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    protected $fillable = [
       'firstname',
       'lastname',
       'middlename',
       'phone',
       'email',
       'note',
    ];



    public function partRepairs(): HasMany
    {
        return $this->hasMany(PartRepair::class);
    }

    public function turbineRepairs(): HasMany
    {
        return $this->hasMany(TurbineRepair::class);
    }

    public function fullname()
    {
        return "TEST";
    }
}
