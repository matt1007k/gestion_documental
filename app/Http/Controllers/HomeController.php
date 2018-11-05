<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use App\User;
use App\Office;
use App\Type;
use App\Document;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rolesCount = Role::count();
        $usersCount = User::count();
        $officeCount = Office::count();
        $typeCount = Type::count();

        return view('admin.dashboard',[
            'rolesCount' => $rolesCount,
            'usersCount' => $usersCount,
            'officeCount' => $officeCount,
            'typeCount' => $typeCount,
        ]);
    }

    public function listado(Request $request)
    {
        
        $documents = Document::where('user_id', auth()->user()->id)
                    ->orderBy('id', 'DESC')->paginate(6);

        return view('admin.pages.listado', compact('documents'));
    }

    public function asignar($id)
    {
        $document = Document::findOrfail($id);
        $users = User::orderBy('name', 'asc')->get();

        return view('admin.pages.asignar', [
            'document' => $document, 
            'users' => $users
        ]);
    }

    public function emitir($id)
    {
        $document = Document::findOrfail($id);
        $offices = Office::orderBy('nombre', 'asc')->get();

        return view('admin.pages.enviar', [
            'document' => $document,
            'offices' => $offices
        ]);
    }
}
