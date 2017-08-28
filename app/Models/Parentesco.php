<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parentesco extends Model{

	public static $MADRE = 1;
	public static $PADRE = 2;
	public static $TIO = 3;
	public static $ABUELA = 4;
	public static $ABUELO = 5;

	protected $fillable = [
		'nombre'
	];

	public function inscripcion(){
		return $this->hasMany(Inscripcion::class);
	}
}
