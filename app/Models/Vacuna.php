<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacuna extends Model
{
    use HasFactory;

    protected $table = "vacuna";
    protected $primaryKey = "vac_id";

    public function vacunas_aplicadas(){
        return $this->hasMany(VacunaAplicada::class, 'vac_id');
    }
}
