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


Route::view('/', "relations");

Route::get('/empleados', ['as'=>'empleados','uses'=>'EmpleadoController@index']);
Route::get('/empleado/create', ['as'=>'empleado_create','uses'=>'EmpleadoController@create']);
Route::post('/empleado/store', ['as'=>'empleado_store','uses'=>'EmpleadoController@store']);
Route::get('/empleado/{id}', ['as'=>'empleado','uses'=>'EmpleadoController@get']);

Route::get('/proyectos', ['as'=>'proyectos','uses'=>'ProyectoController@index']);
Route::get('/proyecto/{id}', ['as'=>'proyecto','uses'=>'ProyectoController@get']);

Route::get('/tareas', ['as'=>'tareas','uses'=>'TareaController@index']);
Route::get('/tarea/{id}', ['as'=>'tarea','uses'=>'TareaController@get']);

Route::get('/departamentos', ['as'=>'departamentos','uses'=>'DepartamentoController@index']);
Route::get('/departamento/{id}', ['as'=>'departamento','uses'=>'DepartamentoController@get']);
