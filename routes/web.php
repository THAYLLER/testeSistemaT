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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tarefas', 'TarefasController@index')->name('tarefas');
Route::get('/tarefas/novas', 'TarefasController@create')->name('tarefas.create');
Route::post('/tarefas/salvar', 'TarefasController@store')->name('tarefas.store');
Route::get('/tarefas/editar/{id}', 'TarefasController@edit')->name('tarefas.edit');
Route::put('/tarefas/atualizar', 'TarefasController@update')->name('tarefas.update');
Route::delete('/tarefas/excluir', 'TarefasController@destroy')->name('tarefas.destroy');
Route::get('/tarefas/atualizar', 'TarefasController@update')->name('tarefas.update');
