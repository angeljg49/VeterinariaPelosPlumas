<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $table = "consulta";
    protected $primaryKey = "con_id";
    
    public function veterinario(){
        return $this->belongsTo(Veterinario::class, 'vet_id');
    }

    public function mascota(){
        return $this->belongsTo(Mascota::class, 'mas_id');
    }
    public function cita_disponible(){
        return $this->belongsTo(CitaDisponible::class, 'cdi_id');
    }

    public function tratamientos(){
        return $this->hasMany(Tratamiento::class, 'con_id');
    }
    public function examenes_complementarios(){
        return $this->hasMany(ExamenComplementario::class, 'con_id');
    }
    public function signos_vitales(){
        return $this->hasMany(SignoVital::class, 'con_id');
    }

}
