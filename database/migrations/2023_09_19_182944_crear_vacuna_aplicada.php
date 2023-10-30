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
        Schema::create('vacuna_aplicada', function (Blueprint $table) {
            $table->Increments('vap_id');
            $table->integer('vac_id');
            $table->integer('mas_id');
            $table->date('vap_fecha');
            $table->integer('vap_edad_aplicada');
            $table->text('vap_observaciones');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('vac_id')->references('vac_id')->on('vacuna');
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
        Schema::dropIfExists('vacuna_aplicada');
    }
};
