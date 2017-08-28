<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAplazadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aplazados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inscripcion_id')->unsigned();
            $table->integer('motivo_id')->unsigned();
            $table->date('dia_id');
            $table->text('motivo');

            $table->index('dia_id');

            $table->timestamps();

            $table->foreign('inscripcion_id')
                ->references('id')
                ->on('inscripciones')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('motivo_id')
                ->references('id')
                ->on('motivos')
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
        Schema::dropIfExists('aplazados');
    }
}
