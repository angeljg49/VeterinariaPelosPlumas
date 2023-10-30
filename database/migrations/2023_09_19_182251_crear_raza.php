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
        Schema::create('raza', function (Blueprint $table) {
            $table->Increments('raz_id');
            $table->integer('esp_id');
            $table->text('raz_nombre');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('esp_id')->references('esp_id')->on('especie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('raza');
    }
};
