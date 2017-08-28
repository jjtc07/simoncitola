<?php

use Illuminate\Database\Seeder;
use App\Models\Rol;

use App\Models\Empleado;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empleados = [
        	[
        		'cargo_id' 					=> 1,
        		'estado_id'					=> 1,
        		'nombre' 					=> 'Juan',
        		'nombre2' 					=> 'Domingo',
        		'apellido' 					=> 'Tolisano',
        		'apellido2' 				=> 'Ramos',
        		'cedula' 					=> '12345678',
        		'fecha_nacimiento' 			=> '1990-05-15',
        		'direccion' 				=> 'Unare',
        		'telefono' 					=> '04241234567',
        		'telefono2' 				=> '20867654321',
        		'fecha_inicio_institucion' 	=> '2016-01-10',
        		'anios_servicio_nacional' 	=> 3,
        		'anios_servicio_estadal' 	=> 3,
        		'anios_servicio_municipal' 	=> 3,
        		'anios_servicio_otros' 		=> 3,
        		'titulo' 					=> 'astronauta',
        		'especialidad' 				=> 'ninguna',
        		'codigo' 					=> '12345',
        		'funcion_id' 				=> 1,
        		'centro_operativo_labora' 	=> 'el que sea',
        		'numero_horas' 				=> 8,
        		'nivel_educativo_atiende'	=> 'no se',
        		'sueldo_mensual' 			=> 1000000,
        		'turno' 					=> 'mañana',
        		'estudia_actualmente' 		=> 1,
        		'descripcion_estudio' 		=> 'estudios...',
        		'observacion' 				=> 'ninguna observacion',
        		'copia_ultimo_recibo' 		=> 1,
        		'copia_cedula' 				=> 1,
        	]
        ];

        foreach ($empleados as $empleado) {
			Empleado::create($empleado);        	
        }

    }
}
