<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;

    protected $table = "mascota";
    protected $primaryKey = "mas_id";

    public function vacunas_aplicadas(){
        return $this->hasMany(VacunaAplicada::class, 'mas_id');
    }
    
    public function consultas(){
        return $this->hasMany(Consulta::class, 'mas_id');
    }

    public function raza(){
        return $this->belongsTo(Raza::class, 'raz_id');
    }
    public function propietario(){
        return $this->belongsTo(Propietario::class, 'pro_id');
    }
}
