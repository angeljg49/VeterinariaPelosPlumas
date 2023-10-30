<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $table = "cita";
    protected $primaryKey = "cit_id";

    public function cita(){
        return $this->belongsTo(CitaDisponible::class, 'cdi_id');
    }
    public function propietario(){
        return $this->belongsTo(Propietario::class, 'pro_id');
    }
}
