<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $table = "usuario";
    protected $primaryKey = "usu_id";

    public function propietarios(){
        return $this->hasMany(Propietario::class, 'usu_id');
    }

}
