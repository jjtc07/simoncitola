<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargo;
use App\Http\Requests\CreateCargoRequest;
use App\Http\Requests\UpdateCargoRequest;

class CargoController extends Controller
{
    public function index()
    {
        $cargos = Cargo::all();
        
        return view("cargo.index")->with("cargos", $cargos);
    }


    public function create()
    {
        $cargo = new Cargo();
        return view("cargo.create")->with('cargo', $cargo);
    }

    public function store(CreateCargoRequest $request)
    {
        try{
            $cargo = Cargo::create(
                $request->only(
                    'nombre',
                    'nivel'
                )
            );

            session()->flash('msg_success', "El cargo '$cargo->nombre' ha sido creado.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('cargos.edit', $cargo->id);
    }

    public function show($id)
    {
        return redirect()->route('cargos.index');
    }

    public function edit(Cargo $cargo)
    {
        return view("cargo.edit")->with("cargo", $cargo);
    }

    public function update(UpdateCargoRequest $request, Cargo $cargo)
    {
        try{
            $cargo->update(
                $request->only(
                    'nombre',
                    'nivel'
                )
            );

            session()->flash('msg_info', "El cargo '$cargo->nombre' ha sido actualizado.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('cargos.edit', $cargo->id);
    }

    public function destroy(Request $request)
    {
        try {

            $cargo = Cargo::find($request->id);

            $cargo->delete();

            session()->flash('msg_danger', "El cargo '$cargo->nombre' ha sido eliminado.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('cargos.index');
    }
}
