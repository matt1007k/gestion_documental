<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('oficinas', function (){
    return datatables()
        ->eloquent(App\Office::query()->orderBy('id','Desc'))
        ->addColumn('btn', 'admin/oficinas/actions')
        ->rawColumns(['btn'])
        ->toJson();
});

Route::get('tipos', function (){
    return datatables()
        ->eloquent(App\Type::query()->orderBy('id','Desc'))
        ->addColumn('btn', 'admin/tipos/actions')
        ->rawColumns(['btn'])
        ->toJson();
});

Route::get('usuarios', function (){
    return datatables()
        ->eloquent(App\User::query()->orderBy('id','Desc'))
        ->addColumn('btn', 'admin.usuarios.actions')
        ->addColumn('estado', 'admin.usuarios.estado')
        ->rawColumns(['btn', 'estado'])
        ->toJson();
});