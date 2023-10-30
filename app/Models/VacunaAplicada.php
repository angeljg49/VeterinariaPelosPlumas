<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacunaAplicada extends Model
{
    use HasFactory;

    protected $table = "vacuna_aplicada";
    protected $primaryKey = "vap_id";
    
    public function vacuna(){
        return $this->belongsTo(Vacuna::class, 'vac_id');
    }
    public function mascota(){
        return $this->belongsTo(Mascota::class, 'mas_id');
    }
}
