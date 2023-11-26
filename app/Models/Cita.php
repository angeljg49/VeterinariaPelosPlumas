<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $table = "cita";
    protected $primaryKey = "cit_id";

    public function cita_disponible(){
        return $this->belongsTo(CitaDisponible::class, 'cdi_id');
    }
    public function mascota(){
        return $this->belongsTo(Mascota::class, 'mas_id');
    }
}
