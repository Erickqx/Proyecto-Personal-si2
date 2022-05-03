<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialclinicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historialclinico', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('gruposanguineo');
            $table->string('ocupacion');
            $table->string('nombredoctor');
            $table->string('ultimaconsulta');

            $table->unsignedBigInteger('id_paciente');
            $table->foreign('id_paciente')->on('paciente')->references('id');

            $table->unsignedBigInteger('id_ante_patologicos_');
            $table->foreign('id_ante_patologicos_')->on('ante_patologicos_')->references('id');

            $table->unsignedBigInteger('id_antenopatologico');
            $table->foreign('id_antenopatologico')->on('antenopatologico')->references('id');

            $table->unsignedBigInteger('id_antefamiliares');
            $table->foreign('id_antefamiliares')->on('antefamiliares')->references('id');

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
        Schema::dropIfExists('historialclinico');
    }
}
