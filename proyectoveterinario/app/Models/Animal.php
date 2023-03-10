<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    // Obtener el veterinario al que le pone la vacuna al animal. con belongsTo la inversa de hasMany

    public function users() {
        return $this->belongsTo(User::class);
    }
// Obtener el cliente al que pertenece al animal. Con belongsTo la inversa de hasMany
    public function clients() {
        return $this->belongsTo(Client::class);
    }


}
