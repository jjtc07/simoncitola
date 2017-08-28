<?php

use Illuminate\Database\Seeder;

use App\Models\Cargo;

class CargoSeeder extends Seeder
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
        		'nombre' 	=> 'admin',
        		'nivel'		=> '0'
        	]
        ];

        foreach ($datos as $dato) {
			Cargo::create($dato);        	
        }
    }
}
