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

Route::get('/', 'PersonaController@index');


Route::post('/visitas', 'VisitaController@store');
Route::delete('/visitas/{id}', 'VisitaController@destroy');


Route::post('/visitantes', 'VisitanteController@store');