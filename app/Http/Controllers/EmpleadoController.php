<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateEmpleadoRequest;
use App\Http\Requests\UpdateEmpleadoRequest;

use App\Models\Empleado;
use App\Models\Cargo;

use DB;

class EmpleadoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $empleados = Empleado::orderBy('nombre', 'asc')->get();
    return view('empleado.index')->with('empleados',$empleados);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
		$cargos = Cargo::orderBy('nombre', 'asc')->get();
  	$empleado = new Empleado;
    return view('empleado.create')->with([
  		'empleado' => $empleado,
  		'cargos' => $cargos,
  		'funciones' => $cargos,
  		'disabled' => ''
  	]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CreateEmpleadoRequest $request)
  {

		try{
			DB::beginTransaction();

	    $empleado = Empleado::create(Empleado::procesarFormulario($request));

      DB::commit();   
	    session()->flash('msg_success', "El Empleado '$empleado->nombre' '$empleado->apellido' ha sido creado exitosamente.");
		} catch (Exception $e) {
      DB::rollback();			
	    session()->flash('msg_danger', $e->getMessage());
		}

    return redirect()->route('empleados.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Empleado $empleado)
  {
		$cargos = Cargo::orderBy('nombre', 'asc')->get();
    return view('empleado.show')->with([
  		'empleado' => $empleado,
  		'cargos' => $cargos,
  		'funciones' => $cargos,
  		'disabled' => 'disabled'
  	]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Empleado $empleado)
  {

		// dd($empleado);

		$cargos = Cargo::orderBy('nombre', 'asc')->get();
    return view('empleado.edit')->with([
  		'empleado' => $empleado,
  		'cargos' => $cargos,
  		'funciones' => $cargos,
  		'disabled' => ''
  	]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateEmpleadoRequest $request, Empleado $empleado)
  {
  	try{
  	  $empleado->update( Empleado::procesarFormulario($request) );

  	  session()->flash('msg_info', "El empleado ha sido actualizado.");
  	} catch (Exception $e) {
  	  session()->flash('msg_danger', $e->getMessage());
  	}

  	// return redirect()->route('empleados.show', $empleado->id);
  	return redirect()->route('empleados.index');

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
