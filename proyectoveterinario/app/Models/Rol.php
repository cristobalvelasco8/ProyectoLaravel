<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    // Obtener los usuarios con distinto rol (veterinario o administrador) con hasMany.
    public function users() {
        return $this->hasMany(User::class);
    }
}
