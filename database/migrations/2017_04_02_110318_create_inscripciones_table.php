<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('alumno_id')->unsigned();
            $table->integer('seccion_id')->unsigned();
            $table->integer('responsable_id')->unsigned();
            $table->integer('parentesco_id')->unsigned();            
            $table->integer('empleado_id')->unsigned();
            $table->boolean('partida_nacimiento');
            $table->boolean('certificado_vacuna');
            $table->boolean('foto');
            $table->boolean('copia_cedula_madre');
            $table->boolean('constancia_trabajo');
            $table->boolean('carta_residencia');
            $table->boolean('otros_ninios_inscritos');
            $table->boolean('colabora');
            $table->date('dia_id');

            $table->index('dia_id');

            $table->timestamps();

            $table->foreign('alumno_id')
                ->references('id')
                ->on('alumnos')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('responsable_id')
                ->references('id')
                ->on('representantes')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('parentesco_id')
                ->references('id')
                ->on('parentescos')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('empleado_id')
                ->references('id')
                ->on('empleados')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('seccion_id')
                ->references('id')
                ->on('secciones')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('dia_id')
                ->references('id')
                ->on('dias')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscripciones');
    }
}
