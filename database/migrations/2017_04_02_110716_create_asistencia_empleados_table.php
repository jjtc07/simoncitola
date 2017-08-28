<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsistenciaEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencia_empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dia_id');
            $table->integer('empleado_id')->unsigned();
            $table->time('hora_entrada')->nullable();
            $table->time('hora_salida')->nullable();
            $table->boolean('presente');
            $table->boolean('ausencia_justificada');
            $table->text('justificacion')->nullable();

            $table->index('dia_id');
            
            $table->timestamps();

            $table->foreign('empleado_id')
                ->references('id')
                ->on('empleados')
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
        Schema::dropIfExists('asistencia_empleados');
    }
}
