<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veterinario extends Model
{
    use HasFactory;

    protected $table = "veterinario";
    protected $primaryKey = "vet_id";
    
    public function consultas(){
        return $this->hasMany(Consultas::class, 'vet_id');
    }
}
