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
    return view('index.inicio');
});

Route::get('/area', 'AreaController@lista');
Route::get('/area/novo', 'AreaController@novo');
Route::post('/area/gravar', 'AreaController@gravar');
Route::get('/area/editar/{id}', 'AreaController@editar');
Route::get('/area/excluir/{id}', 'AreaController@excluir');

Route::get('/professor', 'ProfessorController@lista');
Route::get('/professor/novo', 'ProfessorController@novo');
Route::post('/professor/gravar', 'ProfessorController@gravar');
Route::get('/professor/editar/{id}', 'ProfessorController@editar');
Route::get('/professor/excluir/{id}', 'ProfessorController@excluir');
Route::get('/professor/enviar/{id}', 'ProfessorController@enviar');
Route::post('/professor/enviarMensagem', 'ProfessorController@enviarMensagem');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );
