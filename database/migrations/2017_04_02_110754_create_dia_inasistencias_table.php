<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiaInasistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dia_inasistencias', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dia_id');
            $table->integer('acta_inasistencia_id')->unsigned();

            $table->index('dia_id');

            $table->timestamps();

            $table->foreign('dia_id')
                ->references('id')
                ->on('dias')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('acta_inasistencia_id')
                ->references('id')
                ->on('acta_inasistencias')
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
        Schema::dropIfExists('dia_inasistencias');
    }
}
