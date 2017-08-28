<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class AsistenciaEmpleado extends Model{
	protected $table = 'asistencia_empleados';

	protected $fillable = [
		'dia_id',
		'empleado_id',
		'hora_entrada',
		'hora_salida',
		'hora_salida',
		'presente',
		'ausencia_justificada',
		'justificacion'
	];

	public function dia(){
		return $this->belongsTo(Dia::class);
	}

	public function empleado(){
    	return $this->belongsTo(Empleado::class);
  	}

  	public static function entrada_salida($id){
  		if ($id==1 || $id==3){
        	$asistencias = AsistenciaEmpleado::all()->where('dia_id','=',Carbon::now()->format('Y-m-d'));
        }
        else
        	$asistencias = AsistenciaEmpleado::all()->where('dia_id','=',Carbon::now()->format('Y-m-d'))->where('hora_salida','=',null)->where('hora_entrada','!=',null);
        $empleados = array();
        foreach ($asistencias as $asistencia) {
            array_push($empleados, $asistencia->empleado_id);
        }
        return $empleados;
  	}

  	public static function crearAsistencia($dia,$empleado,$presente,$ausencia_justificada,$hora=null,$justificacion=null){
  		AsistenciaEmpleado::create([
                                'dia_id' => $dia,
                                'empleado_id' => $empleado,
                                'hora_entrada' => $hora,
                                'presente' => $presente,
                                'ausencia_justificada' => $ausencia_justificada,
                                'justificacion' => $justificacion,
        ]);
  	}

}

