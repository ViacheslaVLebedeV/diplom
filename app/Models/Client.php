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
        // Инициализируем переменную для хранения полного имени
        $fullName = $this->lastname;

        // Добавляем переход на новую строку
        $fullName .= "\n";

        // Добавляем имя
        $fullName .= $this->firstname;

        // Добавляем переход на новую строку
        $fullName .= "\n";

        // Проверяем, есть ли у клиента отчество
        if ($this->middlename) {
            // Если отчество есть, добавляем его к полному имени
            $fullName .= $this->middlename;
        }

        // Возвращаем полное имя клиента
        return $fullName;
    }
}
