<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutorizacionCirugia extends Model
{
    use HasFactory;

    protected $table = "autorizacion_cirugia";
    protected $primaryKey = "aci_id";
    
    public function mascota(){
        return $this->belongsTo(Mascota::class, 'mas_id');
    }
    public function propietario(){
        return $this->belongsTo(Propietario::class, 'pro_id');
    }

}
