<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActaInasistencia extends Model
{

	protected $fillable = [
		'dia_id',
		'empleado_id',
		'fecha_justificacion',
		'fecha_no_justificacion'
	];

	public function empleado(){
    return $this->belongsTo(Empleado::class);
	}

	public function dias(){
    return $this->belongsToMany(Dia::class);
  }
}
