<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model{

	// public $cupos_disponibles = 0;

	protected $fillable = [
		'nombre',
		'periodo_id',
		'empleado_id',
		'max_alumnos',
		'edad_alumno',
		'cupos_disponibles'
	];

	public static function all($columns = ['*'])
	{
	    $secciones = (new static)->newQuery()->get(
	        is_array($columns) ? $columns : func_get_args()
	    );

	    foreach ($secciones as $seccion) {
	    	$seccion->getCuposDisponibles();
	    }

	    return $secciones;
	}

	protected function getCuposDisponibles()
	{
		$this->cupos_disponibles = $this->max_alumnos - Inscripcion::where('seccion_id', $this->id)->count();
	}




	public function docente(){
	  return $this->belongsTo(Empleado::class);
	}

	public function inscripciones(){
		return $this->hasMany(Inscripcion::class);
	}

	public function matriculaFinal(){
		return $this->hasOne(MatriculaFinal::class);
	}

	public function periodo(){
		return $this->belongsTo(Periodo::class);
	}

}
