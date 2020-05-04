<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/area', 'AreaController@lista');
Route::get('/area/novo', 'AreaController@novo');
Route::post('/area/gravar', 'AreaController@gravar');
Route::get('/area/editar/{id}', 'AreaController@editar');
Route::get('/area/excluir/{id}', 'AreaController@excluir');
