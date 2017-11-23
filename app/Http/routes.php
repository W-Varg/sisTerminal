<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('principal.index');
});
Route::resource('/principal', 'PrincipalController');
Route::resource('administrar/bus', 'BusController');
Route::resource('administrar/conductor', 'ConductorController');
Route::resource('administrar/dptoTerminal', 'DptoTerminalController');
Route::resource('administrar/viajeRuta', 'ViajeRutaController');
Route::resource('administrar/boletoPasajero', 'BoletaPasajeroController');
