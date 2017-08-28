<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dia;

class DiaController extends Controller
{
    public function show($anio)
    {
        $dias = Dia::where('anio', $anio)->get();

        return view('dia.show')
        	->with([
        		'anio'=> $anio,
        		'dias'=>json_encode($dias)
        	]);
    }

    public function update(Request $request)
    {
        try{
            $dia = Dia::find($request->fecha);
            $dia->tipo = $request->tipo;
            $dia->save();
            return response()->json(json_encode(["msj" => "OK"]));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
