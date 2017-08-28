<?php

use Illuminate\Database\Seeder;

use App\Models\Estado;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = [
        	[
        		'nombre' => 'activo',
        	]
        ];

        foreach ($estados as $estado) {
			Estado::create($estado);        	
        }
    }
}
