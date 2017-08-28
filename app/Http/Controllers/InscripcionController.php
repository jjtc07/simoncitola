<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Empleado;
use App\Models\Estado;
use App\Models\Inscripcion;
use App\Models\Parentesco;
use App\Models\Representante;
use App\Models\Seccion;
use App\Models\User;

use App\Http\Requests\CreateInscripcionRequest;

use DB;
use Redirect;
use Session;
use Carbon\Carbon;

class InscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $inscripciones = Inscripcion::orderBy('id', 'desc')->get();
      // return view('inscripciones.index');
      return view('inscripcion.index')->with( 'inscripciones', $inscripciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
      $inscripcion = new Inscripcion;
      $alumno = new Alumno;
      $padre = new Representante;
      $madre = new Representante;
      $responsable = new Representante;
      $empleado = new Empleado;
      $secciones = Seccion::all();

      $disabled = '';

      return view('inscripcion.create')->with( [
        'inscripcion' => $inscripcion,
        'alumno'      => $alumno,
        'padre'       => $padre,
        'madre'       => $madre,
        'responsable' => $responsable,
        'secciones'   => $secciones,
        'disabled'    => $disabled
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateInscripcionRequest $request){

      try{
        DB::beginTransaction();

        $tipo = $request->get('responsable');
        
        $padre = Representante::create(Inscripcion::procesarFormRepresentante($request, 'Padre'));
        
        $madre = Representante::create(Inscripcion::procesarFormRepresentante($request, 'Madre'));

        if ($tipo == '2') {
          $responsable = Representante::create(Inscripcion::procesarFormRepresentante($request, 'Responsable'));
        }
                

        $alumno = Alumno::create(Inscripcion::procesarFormAlumno($request, $padre->id, $madre->id));

        switch ($request->get('responsable')) {
          case '0':
            $responsable_id = $madre->id;
            $parentesco_id  = Parentesco::$MADRE;
            break;
          case '1':
            $responsable_id = $padre->id;
            $parentesco_id  = Parentesco::$PADRE;
            break;
          case '2':
            $responsable_id = $madre->id; //se obtendra del id de la persona responsable(la nueva que viene del formulario) al registrarla
            $parentesco_id  = Parentesco::$TIO;
            break;
          default:
            $responsable_id = $madre->id;
            $parentesco_id  = Parentesco::$MADRE;
            break;
        }

        // INSCRIPCION /////////////////////////////////////////////////////////////////////
        $datos_inscripcion                   = Inscripcion::procesarFormInscripcion($request);
        $datos_inscripcion['empleado_id']    = Auth::id();
        $datos_inscripcion['alumno_id']      = $alumno->id;
        $datos_inscripcion['responsable_id'] = $responsable_id;
        $datos_inscripcion['parentesco_id']  = $parentesco_id;
        // $datos_inscripcion['dia_id']      = '2017-04-12';
        
        $inscripcion = Inscripcion::create($datos_inscripcion);

        session()->flash('msg_success', 'Se realizo la inscripcion con exito');
        DB::commit();
      } catch(Exception $e){
        DB::rollback();
        session()->flash('msg_danger', $e->getMessage());
          // return Redirect::to('/empleado');
      };
      // session()->flash('msg_success', $e->getMessage());
      return redirect()->route('inscripciones.index');
/*
      // para validar los parametros
      $this->validate($request, [
        'nombrePadre' => 'required',
        'apellidoPadre'   => 'required|url'
      ]);
*/

      // mostrar en pantalla todos los parametros recibidos
      // dd($request->all());

      // para leer un del request
      // $request->get('nombre_campo');
      // $request->get('nombrePadre');

      // atributos magicos

      // $inscripcion->seccion_id = $request->seccion_id;

      // $representante->save();

      // $madre = Representante::create( $request->all() );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Inscripcion $inscripcion)
    {
      $secciones = Seccion::all();

      return view('inscripcion.edit')->with( [
        'inscripcion' => $inscripcion,
        'secciones'   => $secciones
      ]);      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inscripcion $inscripcion)
    {
      switch ($request->get('responsable')) {
        case '0':
          $responsable = $inscripcion->alumno->madre_id;
          break;
        case '1':
          $responsable = $inscripcion->alumno->padre_id;
          break;
        case '2':
          $responsable = $inscripcion->alumno->madre_id;; //se obtendra del id de la persona responsable(la nueva que viene del formulario) al registrarla
          break;
        default:
          $responsable = null;
          break;
      }

      // INSCRIPCION /////////////////////////////////////////////////////////////////////
      $datos_inscripcion['responsable_id']         = $responsable;
      $datos_inscripcion['parentesco_id']          = Parentesco::$MADRE;
      
      $datos_inscripcion['seccion_id']             = $request->get('seccion');
      $datos_inscripcion['partida_nacimiento']     = $request->get('partidaNacimiento');
      $datos_inscripcion['certificado_vacuna']     = $request->get('certificadoVacunas');
      $datos_inscripcion['foto']                   = $request->get('fotos');
      $datos_inscripcion['copia_cedula_madre']     = $request->get('copiaCedulaMadre');
      $datos_inscripcion['constancia_trabajo']     = $request->get('constanciaTrabajo');
      $datos_inscripcion['carta_residencia']       = $request->get('cartaResidencia');
      $datos_inscripcion['otros_ninios_inscritos'] = $request->get('otrosNininos');
      $datos_inscripcion['colabora']               = $request->get('colabora');
      
      // $datos_inscripcion['dia_id']                 = '2017-04-12';
      
      try{
        $inscripcion->update( $datos_inscripcion );

        session()->flash('msg_info', "La inscripcion ha sido actualizada.");
      } catch (Exception $e) {
        session()->flash('msg_danger', $e->getMessage());
      }

      return redirect()->route('inscripciones.index', $inscripcion->id);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
