<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Representante extends Model
{
	protected $fillable = [
		'nombre',
		'nombre2',
		'apellido',
		'apellido2',
		'cedula',
		'sexo',
		'fecha_nacimiento',
		'ocupacion',
		'direccion_trabajo',
		'telefono',
		'telefono2'
	];

	public function isPadre()
	{
		if ( $this->sexo === 'masculino' ) {
			return true;
		} 
	
		return false;		
	}

	# mutadores

	public function getFechaNacimientoAttribute($fecha_nacimiento)
  {
    return Carbon::parse($fecha_nacimiento)->format('d-m-Y');
  }

  public function setFechaNacimientoAttribute($fecha_nacimiento)
  {
    $this->attributes['fecha_nacimiento'] = Carbon::parse($fecha_nacimiento)->format('Y-m-d');
  }

	############################################################################
	#                              Relaciones                                  #
	############################################################################

	public function inscripciones(){
		return $this->hasMany(Inscripcion::class, 'responsable_id', 'id' );
	}

/*
	public function hijosP(){
		return $this->hasMany(Alumno::class, 'padre_id', 'id' );
	}

	public function hijosM(){
		return $this->hasMany(Alumno::class, 'madre_id', 'id' );
	}
*/
	public function hijos()
	{
		if ($this->sexo == 'masculino') {
			return $this->hasMany(Alumno::class, 'padre_id', 'id' );
		} else{
			return $this->hasMany(Alumno::class, 'madre_id', 'id' );			
		}
	}
	
}
