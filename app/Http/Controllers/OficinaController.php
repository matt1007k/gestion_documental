<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Office;

use Alert;

class OficinaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:offices.index')->only(['index']);
        $this->middleware('permission:offices.show')->only(['show']);
        $this->middleware('permission:offices.create')->only(['create', 'store']);
        $this->middleware('permission:offices.edit')->only(['edit', 'update']);
        $this->middleware('permission:offices.destroy')->only(['destroy']);
    }

    public function index()
    {
        alert()->success('You have been logged out.', 'Good bye!');

        return view('admin.oficinas.index');
    }

    public function show($id)
    {
        $office = Office::findOrFail($id);

        return  view('admin.oficinas.show', ['office' => $office]);
    }

    public function create()
    {
        return  view('admin.oficinas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required|max:255',
        ]);

        $office = new Office();
        $office->nombre = $request->nombre;
        $office->descripcion = $request->descripcion;

        if($office->save()){
            return redirect()->route('oficinas.index')
                    ->with('info', 'La oficina se registró con exitó');
        }else{
            return back();
        }


    }

    public function edit($id)
    {
        $office = Office::findOrFail($id);

        return view('admin.oficinas.edit', ['office' => $office]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required|max:255',
        ]);

        $office = Office::findOrFail($id);
        $office->nombre = $request->nombre;
        $office->descripcion = $request->descripcion;

        if($office->save()){
            return redirect()->route('oficinas.index')
                ->with('info', 'La oficina se editó con exitó');
        }else{
            return back();
        }
    }

    public function destroy($id)
    {
        $office = Office::findOrFail($id);
        $office->delete();
    }
}
