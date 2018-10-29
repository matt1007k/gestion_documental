<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use App\User;
use App\Office;
use App\Type;

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
}
