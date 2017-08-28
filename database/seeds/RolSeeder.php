<?php

//namespace DataBase\Seeds;

use Illuminate\Database\Seeder;

use App\Models\Rol;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
        	[
        		'nombre' 	=> 'administrador',
        		'nivel'		=> '0'
        	]
        ];

        foreach ($roles as $rol) {
			Rol::create($rol);        	
        }
    }
}
