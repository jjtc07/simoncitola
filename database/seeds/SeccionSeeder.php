<?php

use Illuminate\Database\Seeder;

use  App\Models\Seccion;

class SeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $datos = [
      	[
					'nombre'      => 'A',
					'periodo_id'  => '1',
					'empleado_id' => '1',
					'max_alumnos' => '30',
					'edad_alumno' => '3'
      	],
      	[
					'nombre'      => 'B',
					'periodo_id'  => '1',
					'empleado_id' => '1',
					'max_alumnos' => '25',
					'edad_alumno' => '2'
      	]
      ];

      foreach ($datos as $dato) {
  			Seccion::create($dato);
      }
    }
}
