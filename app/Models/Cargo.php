<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model{

	protected $fillable = [
		'nombre',
		'nivel'
	];

	public function empleadosSegunCargo(){
    return $this->hasMany(Empleado::class);
  }

  public function empleadosSegunFuncion(){
    return $this->hasMany(Empleado::class, 'funcion_id', 'id' );
  }
}
