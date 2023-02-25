<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participante', function (Blueprint $table) {
            $table->increments('cod_participante');
            $table->foreignId('cod_iniciativa')->constrained('iniciativa');
            $table->foreignId('cod_universidad')->constrained('universidad');
            $table->foreignId('cod_facultad')->constrained('facultad');
            $table->integer('cod_sede');
            $table->string('carrera');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('nro_cedula');
            $table->string('correo_electronico');
            $table->string('nro_celular');
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
        Schema::dropIfExists('participante');
    }
}
