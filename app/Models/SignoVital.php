<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignoVital extends Model
{
    use HasFactory;

    protected $table = "signo_vital";
    protected $primaryKey = "svi_id";
    
    public function consulta(){
        return $this->belongsTo(Consulta::class, 'con_id');
    }
}
