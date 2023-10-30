<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;

    protected $table = "tratamiento";
    protected $primaryKey = "tra_id";
    
    public function consulta(){
        return $this->belongsTo(Consulta::class, 'con_id');
    }

}
