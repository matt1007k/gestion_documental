<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Caffeinated\Shinobi\Models\Role;

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
        $roles = Role::all();

        return view('admin.usuarios.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->apellidos = $request->apellidos;

        if($user->save()){
            $user->roles()->sync($request->get('roles'));

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
