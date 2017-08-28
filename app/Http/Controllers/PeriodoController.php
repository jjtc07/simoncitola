<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;
use App\Http\Requests\CreatePeriodoRequest;
use App\Http\Requests\UpdatePeriodoRequest;
use DB;

class PeriodoController extends Controller
{
    public function index()
    {
        $periodos = Periodo::all()->sortByDesc("nombre");

        return view("periodo.index")->with("periodos", $periodos);
    }

    
    public function create()
    {
        $periodo = new Periodo();
        return view("periodo.create")->with('periodo', $periodo);
    }

    
    public function store(CreatePeriodoRequest $request)
    {
        try{
            DB::beginTransaction();

            $periodo = Periodo::create(
                $request->only(
                    'inicio',
                    'fin',
                    'nombre'
                )
            );
            
            Periodo::generarDias($request->inicio, $request->fin);

            DB::commit();
            session()->flash('msg_success', "El Periodo '$periodo->nombre' ha sido creado.");
        } catch (Exception $e) {
            DB::rollback();
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('periodos.edit', $periodo->id);
    }

    
    public function show($id)
    {
        return redirect()->route('periodos.index');
    }

    
    public function edit(Periodo $periodo)
    {
        return view("periodo.edit")->with("periodo", $periodo);
    }

    
   public function update(UpdatePeriodoRequest $request, Periodo $periodo)
    {
        try{
            DB::beginTransaction();

            $periodo->update(
                $request->only(
                    'inicio',
                    'fin',
                    'nombre'
                )
            );

            Periodo::generarDias($request->inicio, $request->fin);

            DB::commit();

            session()->flash('msg_info', "El periodo '$periodo->nombre' ha sido actualizado.");
        } catch (Exception $e) {
            DB::rollback();

            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('periodos.edit', $periodo->id);
    }

    
    public function destroy(Request $request)
    {
        try {

            $periodo = Periodo::find($request->id);

            $periodo->delete();

            session()->flash('msg_danger', "El periodo '$periodo->nombre' ha sido eliminado.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('periodos.index');
    }
}
