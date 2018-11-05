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
    Route::get('/documentos/elaborar', 'AccionController@elaborar')->name('documentos.elaborar');
    Route::get('/documentos/asignar', 'AccionController@asignar')->name('documentos.asignar');
    Route::get('/documentos/emitir', 'AccionController@emitir')->name('documentos.emitir');

    Route::get('/listado', 'HomeController@listado')->name('documentos.listado');
    Route::get('/asignar/documento/{id}', 'HomeController@asignar')->name('documento.asignar');
    Route::get('/emitir/documento/{id}', 'HomeController@emitir')->name('documento.emitir');

    Route::post('/asignado/documento', 'AccionController@asignado')->name('documento.asignado');
    Route::post('/enviado/documento', 'AccionController@enviado')->name('documento.enviado');

});

