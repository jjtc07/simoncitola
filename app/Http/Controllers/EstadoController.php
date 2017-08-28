<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado;
use App\Http\Requests\CreateEstadoRequest;
use App\Http\Requests\UpdateEstadoRequest;

class EstadoController extends Controller
{

    public function index()
    {
        $estados = Estado::all();

        return view("estado.index")->with("estados", $estados);
    }

    

    public function create()
    {
        $estado = new Estado();
        return view("estado.create")->with('estado', $estado);
    }

    public function store(CreateEstadoRequest $request)
    {
        try{
            $estado = Estado::create(
                $request->only(
                    'nombre'
                )
            );

            session()->flash('msg_success', "El estado '$estado->nombre' ha sido creado.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('estados.edit', $estado->id);
    }

    public function show($id)
    {
        return redirect()->route('estados.index');
    }

    public function edit(Estado $estado)
    {
        return view("estado.edit")->with("estado", $estado);
    }

    public function update(UpdateEstadoRequest $request, Estado $estado)
    {
        try{
            $estado->update(
                $request->only(
                    'nombre'
                )
            );

            session()->flash('msg_info', "El estado '$estado->nombre' ha sido actualizado.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('estados.edit', $estado->id);
    }

    public function destroy(Request $request)
    {
        try {

            $estado = Estado::find($request->id);
            
            $estado->delete();

            session()->flash('msg_danger', "El estado '$estado->nombre' ha sido eliminado.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('estados.index');
    }
}
