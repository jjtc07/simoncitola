<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Alumno extends Model
{

	protected $fillable = [
    'estado_id',
    'padre_id',
		'madre_id',
		'nombre',
		'nombre2',
		'apellido',
		'apellido2',
		'cedula',
		'lugar_nacimiento',
		'fecha_nacimiento',
		'direccion'
	];

  # mutadores

  # fecha_nacimiento
  public function getFechaNacimientoAttribute($fecha_nacimiento)
  {
    return Carbon::parse($fecha_nacimiento)->format('d-m-Y');
  }

  public function setFechaNacimientoAttribute($fecha_nacimiento)
  {
    $this->attributes['fecha_nacimiento'] = Carbon::parse($fecha_nacimiento)->format('Y-m-d');
  }



  public function estado(){
    return $this->belongsTo(Estado::class);
  }

  public function padre(){
    return $this->belongsTo(Representante::class, 'padre_id', 'id');
  }

  public function madre(){
    return $this->belongsTo(Representante::class, 'madre_id', 'id');
  }

  public function asistenciaAlumnos(){
    return $this->hasMany(AsistenciaAlumno::class);
  }

	public function inscripciones(){
    return $this->hasMany(Inscripcion::class);
  }

  public function procesarRequest($request)
  {
  	$datos_alumno['nombre']           = $request->get('nombreAlumno');
  	$datos_alumno['nombre2']          = $request->get('nombre2Alumno');
  	$datos_alumno['apellido']         = $request->get('apellidoAlumno');
  	$datos_alumno['apellido2']        = $request->get('apellido2Alumno');
  	$datos_alumno['cedula']           = $request->get('cedulaAlumno');
  	$datos_alumno['lugar_nacimiento'] = $request->get('lugarNacimientoAlumno');
  	$datos_alumno['fecha_nacimiento'] = $request->get('fechaNacimientoAlumno');
  	$datos_alumno['direccion']        = $request->get('direccionAlumno');
  	$datos_alumno['estado_id']        = Estado::$ACTIVO;

  	return $datos_alumno;
  }
  
}
