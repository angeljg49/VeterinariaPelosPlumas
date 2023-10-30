<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raza extends Model
{
    use HasFactory;

    protected $table = "raza";
    protected $primaryKey = "raz_id";

    public function mascotas(){
        return $this->hasMany(Mascota::class, 'raz_id');
    }

    public function especie(){
        return $this->belongsTo(especie::class, 'esp_id');
    }
}
