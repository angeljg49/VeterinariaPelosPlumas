<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamenComplementario extends Model
{
    use HasFactory;

    protected $table = "examen_complementario";
    protected $primaryKey = "eco_id";
    
    public function consulta(){
        return $this->belongsTo(Consulta::class, 'con_id');
    }
}
