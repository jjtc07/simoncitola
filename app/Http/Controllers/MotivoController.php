<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motivo;
use App\Http\Requests\CreateMotivoRequest;
use App\Http\Requests\UpdateMotivoRequest;

class MotivoController extends Controller
{
    public function index()
    {
        $motivos = Motivo::all();

        return view("motivo.index")->with("motivos", $motivos);
    }

    

    public function create()
    {
        $motivo = new Motivo();
        return view("motivo.create")->with('motivo', $motivo);
    }

    public function store(CreateMotivoRequest $request)
    {
        try{
            $motivo = Motivo::create(
                $request->only(
                    'nombre',
                    'descripcion'
                )
            );

            session()->flash('msg_success', "El motivo '$motivo->nombre' ha sido creado.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('motivos.edit', $motivo->id);
    }

    public function show($id)
    {
        return redirect()->route('motivos.index');
    }

    public function edit(Motivo $motivo)
    {
        return view("motivo.edit")->with("motivo", $motivo);
    }

    public function update(UpdateMotivoRequest $request, Motivo $motivo)
    {
        try{
            $motivo->update(
                $request->only(
                    'nombre',
                    'descripcion'
                )
            );

            session()->flash('msg_info', "El motivo '$motivo->nombre' ha sido actualizado.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('motivos.edit', $motivo->id);
    }

    public function destroy(Request $request)
    {
        try {

            $motivo = Motivo::find($request->id);
            
            $motivo->delete();

            session()->flash('msg_danger', "El motivo '$motivo->nombre' ha sido eliminado.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('motivos.index');
    }
}
