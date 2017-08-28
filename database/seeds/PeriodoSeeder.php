<?php

use Illuminate\Database\Seeder;
use App\Models\Periodo;

class PeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periodos = [
      	[
      		'inicio' 	=> '2017-01-15',
      		'fin' 		=> '2017-10-11',
      		'nombre' 	=> '2017-2017'
      	]
      ];

      foreach ($periodos as $periodo) {
				Periodo::create($periodo);
      }
    }
}
