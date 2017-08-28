<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model{

	public static $ACTIVO = 1;
	public static $SUSPENDIDO = 2;
	public static $RETIRADO = 3;

	protected $fillable = [
		'nombre'
	];

	public function alumnos(){
  	return $this->hasMany(Alumno::class);
  }

  public function empleados(){
  	return $this->hasMany(Empleado::class);
  }

}
