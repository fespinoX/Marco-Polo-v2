<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/preguntas', 'API\PreguntasController@listar');

Route::get('/preguntas/{id}', 'API\PreguntasController@ver');

Route::post('/preguntas', 'API\PreguntasController@crear');

Route::delete('/preguntas/{id}', 'API\PreguntasController@borrar');