<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateRepresentanteRequest;


use App\Models\User;
use App\Models\Representante;

use DB;


class RepresentanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  		$representantes = Representante::orderBy('nombre', 'asc')->get();

  		return view('representante.index')->with('representantes', $representantes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Representante $representante)
    {

        $alumnos = $representante->hijos;

        foreach ($representante->inscripciones as $inscripcion) {
            $alumnos->push($inscripcion->alumno);
        }

        // $alumnos = $alumnos->unique('id');
        $alumnos = $alumnos->unique();

        $tipo = "";
/*
        if ($representante->isPadre()) {
            $tipo = "Padre";
        } else {
            $tipo = "Madre";
        }
*/

        // echo $this->getControllerName();
        // echo $this->getMethodName();
        // echo Route::getCurrentRoute()->action['as'];
        // dd(Route::getCurrentRoute());
        // exit;

        return view('representante.show')->with([
            'representante' => $representante,
            'alumnos'       => $alumnos,
            'tipo'          => $tipo,
            'disabled'      => 'disabled'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Representante $representante)
    {

        // $tipo = "";
        // dd($representante);

        return view('representante.edit')->with([
            'representante' => $representante,
            'disabled'      => ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRepresentanteRequest $request, Representante $representante)
    {
        try{

            $representante->update(
                $request->only(
                    'cedula',
                    'nombre',
                    'nombre2',
                    'apellido',
                    'apellido2',
                    'fecha_nacimiento',
                    'ocupacion',
                    'direccion_trabajo',
                    'telefono',
                    'telefono2'
                )
            );

          session()->flash('msg_info', "El representante ha sido actualizado.");
        } catch (Exception $e) {
          session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('representantes.show', $representante->id);
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

    public function find($cedula)
    {

        $representante = Representante::where('cedula', $cedula)->get();

        // dd($representante);

        if (sizeof($representante)) {
            return response()->json(['representante' => $representante, 'code' => 1]);
        }else{
            return response()->json(['code' => 0]);
        }

    }
}
