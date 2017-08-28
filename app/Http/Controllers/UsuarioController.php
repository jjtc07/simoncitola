<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rol;
use App\Http\Requests\UpdateUsuarioRequest;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        
        return view("usuario.index")->with("usuarios", $usuarios);
    }

    public function show($id)
    {
        return redirect()->route('usuarios.index');
    }

    public function edit(User $usuario)
    {
        $roles = Rol::all()->sortBy("nivel");;
        return view("usuario.edit")->with([
            "usuario" => $usuario,
            "roles"   => $roles
        ]);
    }

    public function update(UpdateUsuarioRequest $request, User $usuario)
    {
        try{

            $usuario->email = $request->email;
            $usuario->rol_id = $request->rol;

            if($request->password){
                $usuario->password = bcrypt($usuario->empleado->cedula);
                $usuario->remember_token = Str::random(60);
                session()->flash('msg_warning', "La Password de '$usuario->email' ha sido reseteada, ahora es su cádula.");
            }

            $usuario->save();

            session()->flash('msg_info', "El usuario '$usuario->nombre' ha sido actualizado.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('usuarios.edit', $usuario->id);
    }

    public function destroy(Request $request)
    {
        try {

            $usuario = User::find($request->id);

            $usuario->delete();

            session()->flash('msg_danger', "El usuario '$usuario->nombre' ha sido eliminado.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('usuarios.index');
    }
}
