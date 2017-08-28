<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatriculaFinal extends Model{

	protected $fillable = [
		'seccion_id',
		'dia_id',
		'observacion'
	];

	public function dia(){
		return $this->belongsTo(Dia::class);
	}

	public function seccion(){
		return $this->belongsTo(Seccion::class);
	}

}
