<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\AsistenciaEmpleado;
use Carbon\Carbon;

class AsistenciaEmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asistencias = AsistenciaEmpleado::orderBy('id', 'asc')->where('dia_id','=',Carbon::now()->format('Y-m-d'))->get();
        return view ('asistencia.empleado.index')->with('asistencias',$asistencias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $empleados=AsistenciaEmpleado::entrada_salida($id);
        if($id==1 || $id==3)
            $empleados=Empleado::all()->whereNotIn('id',$empleados);
        else
            $empleados=Empleado::all()->whereIn('id',$empleados);
        return view ('asistencia.empleado.create')->with(['empleados' => $empleados, 'id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dia= Carbon::now()->format('Y-m-d');
        $hora = Carbon::now()->toTimeString();
        $empleados= $request['empleados'];
        foreach ($empleados as $empleado) {
            AsistenciaEmpleado::crearAsistencia($dia,$empleado,1,0,$hora);
        }
        return response()->json(['mensaje' => 'se ha guardado la asistencia']);
    }

    public function storeInasistencia(Request $request){
        $dia= Carbon::now()->format('Y-m-d');
        $empleados=$request['empleados'];
        for ($i=0; $i < count($empleados) ; $i++) { 
            if($empleados[$i]['justificacion']!=null){
                $ausencia_justificada=1;
            }else{
                $ausencia_justificada=0;
            }
            AsistenciaEmpleado::crearAsistencia($dia,$empleados[$i]['empleado_id'],0,$ausencia_justificada,null,$empleados[$i]['justificacion']);
        }
        return response()->json(['mensaje' => 'se ha guardado la asistencia']);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hora = Carbon::now()->toTimeString();
        AsistenciaEmpleado::where('empleado_id','=',$id)->where('dia_id','=',Carbon::now()->format('Y-m-d'))->update(['hora_salida'=> $hora]);
        return response()->json(['mensaje' => 'se ha guardado la salida']);
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
