<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cargo_id')->unsigned();
            $table->integer('estado_id')->unsigned();
            $table->text('nombre');
            $table->text('nombre2')->nullable();
            $table->text('apellido');
            $table->text('apellido2')->nullable();
            $table->string('cedula', 15)->unique();
            $table->enum('sexo', ['masculino', 'femenino']);
            $table->date('fecha_nacimiento');
            $table->text('direccion');
            $table->text('telefono');
            $table->text('telefono2')->nullable();
            $table->date('fecha_inicio_institucion');
            $table->integer('anios_servicio_nacional')->unsigned()->nullable();;
            $table->integer('anios_servicio_estadal')->unsigned()->nullable();;
            $table->integer('anios_servicio_municipal')->unsigned()->nullable();;
            $table->integer('anios_servicio_otros')->unsigned()->nullable();;
            $table->text('titulo')->nullable()->nullable();;
            $table->text('especialidad')->nullable();
            $table->text('codigo')->nullable();
            $table->integer('funcion_id')->unsigned();
            $table->text('nivel_educativo')->nullable();
            $table->text('centro_operativo_labora')->nullable();
            $table->integer('numero_horas')->unsigned()->nullable();;
            $table->text('nivel_educativo_atiende')->nullable();
            $table->double('sueldo_mensual', 15, 8)->nullable();;
            $table->text('turno')->nullable();;
            $table->boolean('estudia_actualmente')->nullable();;
            $table->text('descripcion_estudio')->nullable();
            $table->text('observacion')->nullable();
            $table->boolean('copia_ultimo_recibo')->nullable();;
            $table->boolean('copia_cedula')->nullable();;

            $table->timestamps();

            $table->foreign('cargo_id')
                ->references('id')
                ->on('cargos')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('funcion_id')
                ->references('id')
                ->on('cargos')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('estado_id')
                ->references('id')
                ->on('estados')
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
        Schema::dropIfExists('empleados');
    }
}
