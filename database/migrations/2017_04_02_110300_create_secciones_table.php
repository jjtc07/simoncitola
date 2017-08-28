<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('periodo_id')->unsigned();
            $table->integer('empleado_id')->unsigned();
            $table->integer('max_alumnos');
            $table->integer('edad_alumno');

            $table->timestamps();

            $table->foreign('periodo_id')
                ->references('id')
                ->on('periodos')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('empleado_id')
                ->references('id')
                ->on('empleados')
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
        Schema::dropIfExists('secciones');
    }
}
