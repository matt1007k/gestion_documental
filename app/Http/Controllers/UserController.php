<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:users.index')->only(['index']);
        $this->middleware('permission:users.show')->only(['show']);
        $this->middleware('permission:users.edit')->only(['edit', 'update']);
        $this->middleware('permission:users.destroy')->only(['destroy']);
    }

    public function index()
    {
        alert()->success('You have been logged out.', 'Good bye!');

        return view('admin.usuarios.index');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return  view('admin.usuarios.show', ['user' => $user]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.usuarios.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|',
            'apellidos' => 'required|string|max:100',
            'dni' => 'required|max:8',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->apellidos = $request->apellidos;
        $user->dni = $request->dni;
        $user->email = $request->email;
        $user->direccion = $request->direccion;

        if($user->save()){
            return redirect()->route('usuarios.index')
                ->with('info', 'El usuario se editó con exitó');
        }else{
            return back();
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
}
