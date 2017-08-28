<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suplencia extends Model{

	protected $fillable = [
		'empleado_suplente_id',
		'empleado_suplantado_id',
		'observacion',
		'dia_id'
	];

		public function empleadoSuplente(){
	    return $this->belongsTo(Empleado::class, 'id', 'empleado_suplente_id' );
	  }

	  public function empleadoSuplantado(){
	    return $this->belongsTo(Empleado::class, 'id', 'empleado_suplantado_id' );
	  }

	  public function dia()
	  {
	  	return $this->belongsTo(Dia::class);
	  }

}
