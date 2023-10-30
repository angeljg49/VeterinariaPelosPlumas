<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    use HasFactory;

    protected $table = "propietario";
    protected $primaryKey = "pro_id";

    public function citas(){
        return $this->hasMany(Cita::class, 'pro_id');
    }
    
    public function autorizaciones(){
        return $this->hasMany(AutorizacionCirugia::class, 'pro_id');
    }

    public function mascotas(){
        return $this->hasMany(Mascota::class, 'pro_id');
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class, 'usu_id');
    }
}
