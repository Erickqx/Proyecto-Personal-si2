<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntePatologicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ante_patologicos_', function (Blueprint $table) {

            $table->id();
            $table->string('cardiologicos');
            $table->string('pulmunares');
            $table->string('digestivos');
            $table->string('diabetes');
            $table->string('renales');
            $table->string('quirurgicos');
            $table->string('alergicos');
            $table->string('transfuciones');
            $table->string('medicamentos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ante_patologicos_');
    }
}
