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
        Schema::create('cita', function (Blueprint $table) {
            $table->Increments('cit_id');
            $table->integer('cdi_id');
            $table->integer('pro_id');
            $table->timestamp('cit_fecha_hora_reserva');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('pro_id')->references('pro_id')->on('propietario');
            $table->foreign('cdi_id')->references('cdi_id')->on('cita_disponible');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cita');
    }
};
