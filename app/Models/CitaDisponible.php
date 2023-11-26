<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitaDisponible extends Model
{
    use HasFactory;

    protected $table = "cita_disponible";
    protected $primaryKey = "cdi_id";

    public function citas(){
        return $this->hasMany(Cita::class, 'cdi_id');
    }
    public function consultas(){
        return $this->hasMany(Consulta::class, 'cdi_id');
    }
}
