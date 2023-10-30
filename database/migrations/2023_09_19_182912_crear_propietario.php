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
        Schema::create('propietario', function (Blueprint $table) {
            $table->Increments('pro_id');
            $table->integer('usu_id');
            $table->text('pro_nombre_completo');
            $table->text('pro_ci');
            $table->text('pro_direccion');
            $table->text('pro_zona');
            $table->timestamps();
            $table->softDeletes();
            // $table->foreign('usu_id')->references('usu_id')->on('usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('propietario');
    }
};
