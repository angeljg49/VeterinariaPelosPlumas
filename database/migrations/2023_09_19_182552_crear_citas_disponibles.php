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
        Schema::create('cita_disponible', function (Blueprint $table) {
            $table->Increments('cdi_id');
            $table->integer('cdi_nro');
            $table->text('cdi_fecha');
            $table->text('cdi_hora');
            $table->integer('cdi_estado');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cita_disponible');
    }
};
