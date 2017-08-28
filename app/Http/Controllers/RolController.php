<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;
use App\Http\Requests\CreateRolRequest;
use App\Http\Requests\UpdateRolRequest;

class RolController extends Controller
{
    public function index()
    {
        $roles = Rol::all();
        
        return view("rol.index")->with("roles", $roles);
    }

    public function create()
    {
        $rol = new Rol();
        return view("rol.create")->with('rol', $rol);
    }

    public function store(CreateRolRequest $request)
    {
        try{
            $rol = Rol::create(
                $request->only(
                    'nombre',
                    'nivel'
                )
            );

            session()->flash('msg_success', "El rol '$rol->nombre' ha sido creado.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('roles.edit', $rol->id);
    }

    public function show($id)
    {
        return redirect()->route('roles.index');
    }

    public function edit(Rol $rol)
    {
        //dd($rol);
        return view("rol.edit")->with("rol", $rol);
    }

    public function update(UpdateRolRequest $request, Rol $rol)
    {
        try{
            $rol->update(
                $request->only(
                    'nombre',
                    'nivel'
                )
            );

            session()->flash('msg_info', "El rol '$rol->nombre' ha sido actualizado.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('roles.edit', $rol->id);
    }

    public function destroy(Request $request)
    {
        try {

            $rol = Rol::find($request->id);
            
            $rol->delete();

            session()->flash('msg_danger', "El rol '$rol->nombre' ha sido eliminado.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('roles.index');
    }
}
