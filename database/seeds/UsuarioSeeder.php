<?php

use Illuminate\Database\Seeder;

use App\Models\User;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios = [
        	[
        		'email' 		=> 'usuario@dominio.com',
        		'password'		=> bcrypt('1234567'),
        		'rol_id' 		=> 1,
        		'empleado_id' 	=> 1,
        	]
        ];

        foreach ($usuarios as $usuario) {
			User::create($usuario);        	
        }
    }
}

