<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DetailType extends Model
{
    protected $fillable = [
      'name',
      'note',
    ];

    public function details(): HasMany
    {
        return $this->hasMany(Detail::class);
    }

}
