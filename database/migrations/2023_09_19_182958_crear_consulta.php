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
        Schema::create('consulta', function (Blueprint $table) {
            $table->Increments('con_id');
            $table->integer('vet_id');
            $table->integer('mas_id');
            $table->integer('cdi_id')->nullable();
            $table->text('con_motivo');
            $table->text('con_antecedentes');
            $table->text('con_signos_clinicos');
            $table->text('con_diagnostico_presuntivo');
            $table->text('con_quirurgico');
            $table->text('con_higienico');
            $table->date('con_proxima_revision');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('vet_id')->references('vet_id')->on('veterinario');
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
        Schema::dropIfExists('consulta');
    }
};
