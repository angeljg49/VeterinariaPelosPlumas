<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mascota', function (Blueprint $table) {
            $table->Increments('mas_id');
            $table->integer('raz_id');
            $table->integer('pro_id');
            $table->text('mas_nombre');
            $table->integer('mas_edad');
            $table->integer('mas_sexo');
            $table->text('mas_color');
            $table->date('mas_fnac_estimado');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('raz_id')->references('raz_id')->on('raza');
            // $table->foreign('pro_id')->references('pro_id')->on('propietario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mascota');
    }
};
