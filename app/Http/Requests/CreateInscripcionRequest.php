<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateInscripcionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // se asegura de que el usuario que esta haciendo la inscripcion este autorizado
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

      if( $this->request->get('responsable') === '2'){
        return [
          'nombreAlumno'                 => 'required',
          'apellidoAlumno'               => 'required',
          'cedulaAlumno'                 => 'required',
          'lugarNacimientoAlumno'        => 'required',
          'fechaNacimientoAlumno'        => 'required',
          
          'seccion'                      => 'required',
          'responsable'                  => 'required',
          'partidaNacimiento'            => 'required',
          'certificadoVacunas'           => 'required',
          'foto'                         => 'required',
          'copiaCedulaMadre'             => 'required',
          'constanciaTrabajo'            => 'required',
          'cartaResidencia'              => 'required',
          'otrosNininos'                 => 'required',
          'colabora'                     => 'required',
          
          'nombrePadre'                  => 'required',
          'apellidoPadre'                => 'required',
          'cedulaPadre'                  => 'required',
          'fecha_nacimientoPadre'        => 'required',
          'ocupacionPadre'               => 'required',
          'direccion_trabajoPadre'       => 'required',
          'telefonoPadre'                => 'required',
          
          'nombreMadre'                  => 'required',
          'apellidoMadre'                => 'required',
          'cedulaMadre'                  => 'required',
          'fecha_nacimientoMadre'        => 'required',
          'ocupacionMadre'               => 'required',
          'direccion_trabajoMadre'       => 'required',
          'telefonoMadre'                => 'required',
          
          'nombreResponsable'            => 'required',
          'apellidoResponsable'          => 'required',
          'cedulaResponsable'            => 'required',
          'fecha_nacimientoResponsable'  => 'required',
          'ocupacionResponsable'         => 'required',
          'direccion_trabajoResponsable' => 'required',
          'telefonoResponsable'          => 'required',
        ];
      } 

      return [
        'nombreAlumno'                 => 'required',
        'apellidoAlumno'               => 'required',
        'cedulaAlumno'                 => 'required',
        'lugarNacimientoAlumno'        => 'required',
        'fechaNacimientoAlumno'        => 'required',
        
        'seccion'                      => 'required',
        'responsable'                  => 'required',
        'partidaNacimiento'            => 'required',
        'certificadoVacunas'           => 'required',
        'foto'                         => 'required',
        'copiaCedulaMadre'             => 'required',
        'constanciaTrabajo'            => 'required',
        'cartaResidencia'              => 'required',
        'otrosNininos'                 => 'required',
        'colabora'                     => 'required',
        
        'nombrePadre'                  => 'required',
        'apellidoPadre'                => 'required',
        'cedulaPadre'                  => 'required',
        'fecha_nacimientoPadre'        => 'required',
        'ocupacionPadre'               => 'required',
        'direccion_trabajoPadre'       => 'required',
        'telefonoPadre'                => 'required',
        
        'nombreMadre'                  => 'required',
        'apellidoMadre'                => 'required',
        'cedulaMadre'                  => 'required',
        'fecha_nacimientoMadre'        => 'required',
        'ocupacionMadre'               => 'required',
        'direccion_trabajoMadre'       => 'required',
        'telefonoMadre'                => 'required',
      ];
    }
}
