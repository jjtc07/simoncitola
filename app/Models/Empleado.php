<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Empleado extends Model{

  protected $fillable = [
    'cargo_id',
    'estado_id',
    'nombre',
    'nombre2',
    'apellido',
    'apellido2',
    'cedula',
    'fecha_nacimiento',
    'direccion',
    'telefono',
    'telefono2',
    'fecha_inicio_institucion',
    'anio_servicio_nacional',
    'anio_servicio_estatal',
    'anio_servicio_municipal',
    'anio_servicio_otros',
    'titulo',
    'especialidad',
    'codigo',
    'funcion_id',
    'nivel_educativo',
    'centro_operativo_labora',
    'numero_horas',
    'nivel_educativo_atiende',
    'sueldo_mensual',
    'turno',
    'estudia_actualmente',
    'descripcion_estudio',
    'observacion',
    'copia_ultimo_recibo',
    'copia_cedula'
  ];

  public static function procesarFormulario($request)
  {
    $datos['cargo_id']                 = $request->get('cargo');
    $datos['estado_id']                = 1;
    $datos['funcion_id']               = $request->get('funcion');
    $datos['nombre']                   = $request->get('nombre');
    $datos['nombre2']                  = $request->get('nombre2');
    $datos['apellido']                 = $request->get('apellido');
    $datos['apellido2']                = $request->get('apellido2');
    $datos['cedula']                   = $request->get('cedula');
    $datos['fecha_nacimiento']         = $request->get('fecha_nacimiento');
    $datos['direccion']                = $request->get('direccion');
    $datos['telefono']                 = $request->get('telefono');
    $datos['telefono2']                = $request->get('telefono2');
    $datos['fecha_inicio_institucion'] = $request->get('fecha_inicio_institucion');
    $datos['anios_servicio_nacional']  = $request->get('anios_servicio_nacional');
    $datos['anios_servicio_estatal']   = $request->get('anios_servicio_estatal');
    $datos['anios_servicio_municipal'] = $request->get('anios_servicio_municipal');
    $datos['anios_servicio_otros']     = $request->get('anios_servicio_otros');
    $datos['titulo']                   = $request->get('titulo');
    $datos['especialidad']             = $request->get('especialidad');
    $datos['codigo']                   = $request->get('codigo');
    $datos['nivel_educativo']          = $request->get('nivel_educativo');
    $datos['centro_operativo_labora']  = $request->get('centro_operativo_labora');
    $datos['numero_horas']             = $request->get('numero_horas');
    $datos['nivel_educativo_atiende']  = $request->get('nivel_educativo_atiende');
    $datos['sueldo_mensual']           = $request->get('sueldo_mensual');
    $datos['turno']                    = $request->get('turno');
    $datos['estudia_actualmente']      = $request->get('estudia_actualmente');
    $datos['descripcion_estudio']      = $request->get('descripcion_estudio');
    $datos['observacion']              = $request->get('observacion');
    $datos['copia_ultimo_recibo']      = $request->get('copia_ultimo_recibo');
    $datos['copia_cedula']             = $request->get('copia_cedula');

    return $datos;
  }
/*
  public static function formatearFecha($fecha)
  {
    $fecha = explode("-", $fecha);
    $fecha = $fecha[2]."-".$fecha[1]."-".$fecha[0];

    return $fecha;
  }
*/
  
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

  # fecha_inicio_institucion
  public function getFechaInicioInstitucionAttribute($fecha_inicio_institucion)
  {
    return Carbon::parse($fecha_inicio_institucion)->format('d-m-Y');
  }

  public function setFechaInicioInstitucionAttribute($fecha_inicio_institucion)
  {
    $this->attributes['fecha_inicio_institucion'] = Carbon::parse($fecha_inicio_institucion)->format('Y-m-d');
  }

  # RELACIONES
	public function actasInasistencias(){
    return $this->hasMany(ActaInasistencia::class);
  }

	public function asistenciasEmpleados(){
    return $this->hasMany(AsistenciaEmpleado::class);
  }

  public function cargo(){
    return $this->belongsTo(Cargo::class);
  }

  public function funcion(){
    return $this->belongsTo(Cargo::class, 'funcion_id', 'id');
  }

  public function estado(){
    return $this->belongsTo(Estado::class);
  }

  public function guardia(){
    return $this->hasOne(Guardia::class);
  }

  public function suplente(){
    return $this->hasMany(Cargo::class, 'id', 'empleado_suplente_id');
  }

  public function seccion(){
    return $this->hasOne(Seccion::class);
  }

  public function suplantado(){
    return $this->hasMany(Cargo::class, 'id', 'empleado_suplantado_id');
  }

  public function user(){
    return $this->hasOne(User::class);
  }

  public function inscripcion(){
    return $this->hasOne(Inscripcion::class);
  }


}
