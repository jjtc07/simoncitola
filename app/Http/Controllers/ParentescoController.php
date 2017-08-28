<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parentesco;
use App\Http\Requests\CreateParentescoRequest;
use App\Http\Requests\UpdateParentescoRequest;

class ParentescoController extends Controller
{

    public function index()
    {
        $parentescos = Parentesco::all();

        return view("parentesco.index")->with("parentescos", $parentescos);
    }

    

    public function create()
    {
        $parentesco = new Parentesco();
        return view("parentesco.create")->with('parentesco', $parentesco);
    }

    public function store(CreateParentescoRequest $request)
    {
        try{
            $parentesco = Parentesco::create(
                $request->only(
                    'nombre'
                )
            );

            session()->flash('msg_success', "El parentesco '$parentesco->nombre' ha sido creado.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('parentescos.edit', $parentesco->id);
    }

    public function show($id)
    {
        return redirect()->route('parentescos.index');
    }

    public function edit(Parentesco $parentesco)
    {
        return view("parentesco.edit")->with("parentesco", $parentesco);
    }

    public function update(UpdateParentescoRequest $request, Parentesco $parentesco)
    {
        try{
            $parentesco->update(
                $request->only(
                    'nombre'
                )
            );

            session()->flash('msg_info', "El parentesco '$parentesco->nombre' ha sido actualizado.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('parentescos.edit', $parentesco->id);
    }

    public function destroy(Request $request)
    {
        try {

            $parentesco = Parentesco::find($request->id);
            
            $parentesco->delete();

            session()->flash('msg_danger', "El parentesco '$parentesco->nombre' ha sido eliminado.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('parentescos.index');
    }
}
