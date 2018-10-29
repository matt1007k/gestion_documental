<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:roles.index')->only(['index']);
        $this->middleware('permission:roles.show')->only(['show']);
        $this->middleware('permission:roles.create')->only(['create', 'store']);
        $this->middleware('permission:roles.edit')->only(['edit', 'update']);
        $this->middleware('permission:roles.destroy')->only(['destroy']);
    }

    public function index()
    {
        alert()->success('You have been logged out.', 'Good bye!');

        return view('admin.roles.index');
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);

        return  view('admin.roles.show', ['role' => $role]);
    }

    public function create()
    {
        $permissions = Permission::all();
        return  view('admin.roles.create', ['permissions' => $permissions]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required|max:255',
        ]);

        $role = new Role();
        $role->name = $request->name;
        $role->slug = $request->slug;
        $role->description = $request->description;

        if($role->save()){
            $role->permissions()->sync($request->get('permissions'));

            return redirect()->route('roles.index')
                    ->with('info', 'La role se registró con exitó');
        }else{
            return back();
        }

    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        return view('admin.roles.edit', ['role' => $role, 'permissions' => $permissions]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required|max:255',
        ]);

        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->slug = $request->slug;
        $role->description = $request->description;

        if($role->save()){
            $role->permissions()->sync($request->get('permissions'));

            return redirect()->route('roles.index')
                ->with('info', 'El rol se editó con exitó');
        }else{
            return back();
        }
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
    }
}
