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
        Schema::create('autorizacion_cirugia', function (Blueprint $table) {
            $table->Increments('aci_id');
            $table->integer('pro_id');
            $table->integer('mas_id');
            $table->integer('aci_estado_vacunas');
            $table->integer('aci_alimentacion');
            $table->integer('aci_desparacitacion');
            $table->date('aci_fecha');
            $table->time('aci_hora_ingreso');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('pro_id')->references('pro_id')->on('propietario');
            $table->foreign('mas_id')->references('mas_id')->on('mascota');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autorizacion_cirugia');
    }
};
