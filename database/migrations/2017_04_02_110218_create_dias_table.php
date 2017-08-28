<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dias', function (Blueprint $table) {
            $table->date('id');
            $table->enum('tipo', ['libre', 'administrativo', 'escolar']);
            $table->tinyInteger('dia');
            $table->tinyInteger('mes');
            $table->integer('anio');
            $table->tinyInteger('semana_mes');
            $table->tinyInteger('semana_anio');
            $table->tinyInteger('dia_semana');
            $table->tinyInteger('fin_semana');
            $table->timestamps();

            $table->primary('id');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dias');
    }
}
