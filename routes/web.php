<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('admin');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', 'HomeController@index')->name('admin');


    //Roles
    Route::resource('roles', 'RoleController');

    //usuarios
    Route::get('/perfil/{user}', 'UserController@perfil')->name('perfil');
    Route::resource('usuarios', 'UserController')->except([
        'create', 'store'
    ]);;

    //oficinas
    Route::resource('oficinas', 'OficinaController');

    //tipo-documentos
    Route::resource('tipos', 'TipoDocumentoController');

    //documentos
    Route::resource('documentos', 'DocumentoController');

});

