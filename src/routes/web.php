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

use App\Http\Controllers\TaskController;

Route::get('/tasks', 'TaskController@index2')->name('tasks.index');

Route::post('/tasks', 'TaskController@add');

Route::delete('/tasks/{tasks}', 'TaskController@delete');

Route::get('/tasks/{tasks}/edit' ,'TaskController@edit_open' );

Route::put('/tasks/{tasks}','TaskController@edit_execute');
