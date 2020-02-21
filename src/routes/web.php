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

Route::get('/', 'TaskController@index');

Route::post('/task', 'TaskController@add');

Route::delete('/task/{id}', 'TaskController@delete');

Route::post('/edit/{id}' ,'TaskController@edit_open' );

Route::post('/edit/{id}/execute','TaskController@edit_execute');
