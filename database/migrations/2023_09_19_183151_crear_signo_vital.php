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
        Schema::create('signo_vital', function (Blueprint $table) {
            $table->Increments('svi_id');
            $table->integer('con_id');
            $table->text('svi_temperatura');
            $table->text('svi_peso');
            $table->text('svi_fc');
            $table->text('svi_fr');
            $table->text('svi_mm');
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
        Schema::dropIfExists('signo_vital');
    }
};
