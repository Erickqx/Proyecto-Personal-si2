<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntenopatologicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antenopatologico', function (Blueprint $table) {
            $table->id();
            $table->string('alcohol');
            $table->string('tabaquismo');
            $table->string('drogas');
            $table->string('inmunizaciones');
            $table->string('otros');
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
        Schema::dropIfExists('antenopatologico');
    }
}
