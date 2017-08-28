<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guardia extends Model{

	protected $fillable = [
		'dia_id',
		'empleado_id'
	];

	public function asistenciDiariaAlumno(){
		return $this->hasOne(AsistenciaDiariaAlumno::class);
	}

	public function empleado(){
    return $this->belongsTo(Empleado::class);
  }

  public function dia(){
  	return $this->belongsTo(Dia::class);
  }
}
