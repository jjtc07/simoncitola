<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motivo extends Model
{

	protected $fillable = [
		'nombre',
		'descripcion'
	];

	public function aplazados(){
      return $this->hasMany(Aplazado::class);
  }
}
