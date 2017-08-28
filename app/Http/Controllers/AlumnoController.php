<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateAlumnoRequest;

use App\Models\Alumno;
use App\Models\Seccion;
use App\Models\Inscripcion;
use App\Models\Empleado;
use App\Models\User;
use App\Models\Rol;


class AlumnoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(){
    $alumnos = Alumno::orderBy('id', 'desc')->get();

    return view('alumno.index')->with('alumnos', $alumnos);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return "esta vista no va.";
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Alumno $alumno)
  {
    return view('alumno.show')->with( [
      'alumno'      => $alumno,
      'disabled'      => 'disabled'
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Alumno $alumno)
  {
    return view('alumno.edit')->with( [
      'alumno'      => $alumno,
      'disabled'    => ''
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateAlumnoRequest $request, Alumno $alumno)
  {

    try{
      $alumno->update( $alumno->procesarRequest($request) );

      session()->flash('msg_info', "El alumno ha sido actualizado.");
    } catch (Exception $e) {
      session()->flash('msg_danger', $e->getMessage());
    }

    return redirect()->route('alumnos.show', $alumno->id);
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
