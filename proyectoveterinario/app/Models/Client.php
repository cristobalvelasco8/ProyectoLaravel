<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

   // Obtener los animales de los clientes con hasMany
    public function animals() {
        return $this->hasMany(Animal::class);
    }
}
