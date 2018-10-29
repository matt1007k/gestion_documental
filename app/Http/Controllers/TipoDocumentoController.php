<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;

class TipoDocumentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:types.index')->only(['index']);
        $this->middleware('permission:types.show')->only(['show']);
        $this->middleware('permission:types.create')->only(['create', 'store']);
        $this->middleware('permission:types.edit')->only(['edit', 'update']);
        $this->middleware('permission:types.destroy')->only(['destroy']);
    }

    public function index()
    {

        return view('admin.tipos.index');
    }

    public function show($id)
    {
        $type = Type::findOrFail($id);

        return  view('admin.tipos.show', ['type' => $type]);
    }

    public function create()
    {
        return  view('admin.tipos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required|max:255',
        ]);

        $type = new Type();
        $type->nombre = $request->nombre;
        $type->descripcion = $request->descripcion;

        if($type->save()){
            return redirect()->route('tipos.index')
                ->with('info', 'El tipo de documento se registró con exitó');
        }else{
            return back();
        }


    }

    public function edit($id)
    {
        $type = Type::findOrFail($id);

        return view('admin.tipos.edit', ['type' => $type]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required|max:255',
        ]);

        $type = Type::findOrFail($id);
        $type->nombre = $request->nombre;
        $type->descripcion = $request->descripcion;

        if($type->save()){
            return redirect()->route('tipos.index')
                ->with('info', 'El tipo de documento se editó con exitó');
        }else{
            return back();
        }
    }

    public function destroy($id)
    {
        $type = Type::findOrFail($id);
        $type->delete();
    }
}
