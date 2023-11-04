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
        Schema::create('tratamiento', function (Blueprint $table) {
            $table->Increments('tra_id');
            $table->integer('con_id');
            $table->integer('tra_tipo');
            $table->integer('tra_farmaco');
            $table->integer('tra_mg');
            $table->integer('tra_ml');
            $table->integer('tra_via');
            $table->integer('tra_observaciones_indicaciones');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('con_id')->references('con_id')->on('consulta')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tratamiento');
    }
};
