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
    Route::get('/elaborar/documento', 'AccionController@elaborar')->name('documentos.elaborar');
    Route::get('/asignar/documento', 'AccionController@asignar')->name('documentos.asignar');
    Route::get('/emitir/documento', 'AccionController@emitir')->name('documentos.emitir');

    Route::get('/documentos-asignados', 'AccionController@asignados')->name('documentos.asignados');
    Route::get('/documentos-enviados', 'AccionController@enviados')->name('documentos.enviados');

    Route::get('/listado', 'HomeController@listado')->name('documentos.listado');
    Route::get('/asignar/documento/{id}', 'HomeController@asignar')->name('documento.asignar');
    Route::get('/emitir/documento/{id}', 'HomeController@emitir')->name('documento.emitir');
    //Route::get('/atender/documento/{id}', 'HomeController@atender')->name('documento.atender');

    Route::post('/asignado/documento', 'AccionController@asignado')->name('documento.asignado');
    Route::post('/enviado/documento', 'AccionController@enviado')->name('documento.enviado');
    Route::post('/atendido/documento', 'AccionController@atendido')->name('documento.atendido');
    Route::post('/elaborado/documento', 'AccionController@elaborado')->name('documento.elaborado');

    // Notificaciones
    Route::get('notificaciones', 'NotificationsController@index')->name('notifications.index');
    Route::put('notificaciones/{id}', 'NotificationsController@read')->name('notifications.read');
    Route::post('notificaciones', 'NotificationsController@readAll')->name('notifications.readall');

});

