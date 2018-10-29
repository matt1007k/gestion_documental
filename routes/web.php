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
    Route::get('/perfil/{user}', function () {
        return "perfil";
    })->name('perfil');

    //Roles
    Route::get('roles', 'RoleController@index')->name('roles.index')->middleware('permission:roles.index');
    Route::get('roles/{role}', 'RoleController@show')->name('roles.show')->middleware('permission:roles.show');
    Route::get('roles/create', 'RoleController@create')->name('roles.create')->middleware('permission:roles.create');
    Route::post('roles/store', 'RoleController@store')->name('roles.store')->middleware('permission:roles.create');
    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')->middleware('permission:roles.edit');
    Route::put('roles/{role}', 'RoleController@update')->name('roles.update')->middleware('permission:roles.edit');
    Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')->middleware('permission:roles.destroy');

    //usuarios
    Route::resource('usuarios', 'UserController')->except([
        'create', 'store'
    ]);;

    //oficinas
    Route::resource('oficinas', 'OficinaController');

    //tipo-documentos
    Route::resource('tipos', 'TipoDocumentoController');


    //documentos
    Route::get('documentos', 'DocumentoController@index')->name('documentos.index')->middleware('permission:documents.index');
    Route::get('documentos/{documento}', 'DocumentoController@show')->name('documentos.show')->middleware('permission:documents.show');
    Route::get('documentos/create', 'DocumentoController@create')->name('documentos.create')->middleware('permission:documents.create');
    Route::post('documentos/store', 'DocumentoController@store')->name('documentos.store')->middleware('permission:documents.create');
    Route::get('documentos/{documento}/edit', 'DocumentoController@edit')->name('documentos.edit')->middleware('permission:documents.edit');
    Route::put('documentos/{documento}', 'DocumentoController@update')->name('documentos.update')->middleware('permission:documents.edit');
    Route::delete('documentos/{documento}', 'DocumentoController@destroy')->name('documentos.destroy')->middleware('permission:documents.destroy');

});

