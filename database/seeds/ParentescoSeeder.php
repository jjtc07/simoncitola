<?php

use Illuminate\Database\Seeder;

use App\Models\Parentesco;

class ParentescoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $parentescos = [
      	[
      		'nombre' 	=> 'Madre'
      	],
      	[
      		'nombre' 	=> 'Padre'
      	],
      	[
      		'nombre' 	=> 'Abuelo'
      	],
      	[
      		'nombre' 	=> 'Abuela'
      	],
      	[
      		'nombre' 	=> 'Tio'
      	]
      ];

      foreach ($parentescos as $parentesco) {
				Parentesco::create($parentesco);        	
      }
    }
}
