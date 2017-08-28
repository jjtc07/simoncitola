<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsistenciaAlumno extends Model
{
	protected $fillable = [
		'alumno_id',
		'dia_id',
		'presente'
	];

	public function alumno(){
    return $this->belongsTo(Alumno::class);
	}

	public function dia(){
		return $this->belongsTo(Dia::class);
	}
}
