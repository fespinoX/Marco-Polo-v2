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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

// Todas las rutas que definamos acá, van a automáticamente tener prefijado
// la url "/api".
// Es decir, si definimos una ruta "/saraza", la ruta final es "/api/saraza".
// Route::get('/peliculas', 'PeliculasApiController@listar');
Route::get('/preguntas', 'API\PreguntasController@listar');

Route::get('/preguntas/{id}', 'API\PreguntasController@ver');

Route::post('/preguntas', 'API\PreguntasController@crear');