<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsistenciaDiariaAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencia_diaria_alumnos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('guardia_id')->unsigned();
            $table->text('observacion')->nullable();

            $table->timestamps();

            $table->foreign('guardia_id')
                ->references('id')
                ->on('guardias')
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
        Schema::dropIfExists('asistencia_diaria_alumnos');
    }
}
