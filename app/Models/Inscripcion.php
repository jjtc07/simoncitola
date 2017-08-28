<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{

	protected $fillable = [
		'empleado_id',
		'alumno_id',
		'seccion_id',
		'responsable_id',
		'parentesco_id',
		'partida_nacimiento',
		'certificado_vacuna',
		'foto',
		'copia_cedula_madre',
		'constancia_trabajo',
		'carta_residencia',
		'otros_ninios_inscritos',
		'colabora',
		'dia_id'
	];

	public static function procesarFormAlumno($request, $padre_id, $madre_id)
	{
		// ALUMNO //////////////////////////////////////////////////////////////////////////
		$datos_alumno['estado_id']        = Estado::$ACTIVO;
		$datos_alumno['padre_id']         = $padre_id;
		$datos_alumno['madre_id']         = $madre_id;
		$datos_alumno['nombre']           = $request->get('nombreAlumno');
		$datos_alumno['nombre2']          = $request->get('nombre2Alumno');
		$datos_alumno['apellido']         = $request->get('apellidoAlumno');
		$datos_alumno['apellido2']        = $request->get('apellido2Alumno');
		$datos_alumno['cedula']           = $request->get('cedulaAlumno');
		$datos_alumno['lugar_nacimiento'] = $request->get('lugarNacimientoAlumno');
		$datos_alumno['fecha_nacimiento'] = $request->get('fechaNacimientoAlumno');
		$datos_alumno['direccion']        = $request->get('direccionAlumno');
		return null;
	}

	public static function procesarFormRepresentante($request, $tipo)
	{
		$datos['nombre']            = $request->get("nombrePadre$tipo");
		$datos['nombre2']           = $request->get("nombre2Padre$tipo");
		$datos['apellido']          = $request->get("apellidoPadre$tipo");
		$datos['apellido2']         = $request->get("apellido2Padre$tipo");
		$datos['cedula']            = $request->get("cedulaPadre$tipo");
		$datos['fecha_nacimiento']  = $request->get("fechaNacimientoPadre$tipo");
		$datos['ocupacion']         = $request->get("ocupacionPadre$tipo");
		$datos['direccion_trabajo'] = $request->get("direccionTrabajoPadre$tipo");
		$datos['telefono']          = $request->get("telefonoPadre$tipo");
		$datos['telefono2']         = $request->get("telefono2Padre$tipo");
		return $datos;
	}

	public static function procesarFormInscripcion($request)
	{
		$datos['seccion_id']             = $request->get('seccion');
		$datos['partida_nacimiento']     = $request->get('partidaNacimiento');
		$datos['certificado_vacuna']     = $request->get('certificadoVacunas');
		$datos['foto']                   = $request->get('fotos');
		$datos['copia_cedula_madre']     = $request->get('copiaCedulaMadre');
		$datos['constancia_trabajo']     = $request->get('constanciaTrabajo');
		$datos['carta_residencia']       = $request->get('cartaResidencia');
		$datos['otros_ninios_inscritos'] = $request->get('otrosNininos');
		$datos['colabora']               = $request->get('colabora');
		$datos_inscripcion['dia_id']     = date("Y-m-d");
		
		return $datos;
	}

  public function alumno(){
    return $this->belongsTo(Alumno::class);
  }

  public function aplazado(){
  	return $this->hasOne(Aplazado::class);
  }

  public function dia(){
		return $this->belongsTo(Dia::class);
	}

  public function responsable(){
  	return $this->belongsTo(Representante::class, 'responsable_id', 'id');
  }

  public function parentesco(){
		return $this->belongsTo(Parentesco::class);
	}

	public function seccion(){
		return $this->belongsTo(Seccion::class);
	}


}
