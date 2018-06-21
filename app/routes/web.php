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

Route::get('/', 'IndexController@home');
Route::get('/index', 'IndexController@home');
// esto de arriba es necesario porque Laravel y MAMP no se llevan bien y si no me redirecciona a localhost:8888 ¯\_(ツ)_/¯


 /* Auth related */

 Route::get('registrarse', [
	'as' => 'auth.showRegistro',
	'uses' => 'AuthController@showRegistro'
]);

Route::post('registrarse', [
	'as' => 'auth.doRegistro',
	'uses' => 'AuthController@doRegistro'
]);

Route::get('login', [
	'as' => 'login',
	'uses' => 'AuthController@showLogin'
]);

Route::post('login', [
	'as' => 'auth.doLogin',
	'uses' => 'AuthController@doLogin'
]);

Route::get('logout', [
	'as' => 'auth.logout',
	'uses' => 'AuthController@logout'
]);

Route::get('/preguntas', [
		'as' => 'preguntas.index',
		'uses' => 'PreguntasController@index'
	]);

Route::middleware('auth')->group(function() {

	Route::get('/paneluser', [
		'as' => 'paneluser',
		'uses' => 'AuthController@showPanel',
	]);

	Route::put('/paneluser/{user}/update', [
		'as' => 'user.update',
		'uses' => 'AuthController@userEditar',
	]);

	Route::get('/preguntas/nueva', [
		'as' => 'preguntas.formAlta',
		'uses' => 'PreguntasController@formAlta',
	]);

	Route::post('/preguntas/nueva', [
		'as' => 'preguntas.crear',
		'uses' => 'PreguntasController@crear'
	]);

	Route::get('/preguntas/{id_pregunta}', 'PreguntasController@detallepregunta');

	Route::get('/preguntas/{id}', 'PreguntasController@detallepregunta');


	Route::middleware('rolusuario')->group(function() {

		Route::get('/preguntas/{id}/editar', [
				'as' => 'preguntas.formEditar',
				'uses' => 'PreguntasController@formEditar',
			]);

		Route::put('/preguntas/{id}/editar', [
			'as' => 'preguntas.editar',
			'uses' => 'PreguntasController@editar',
		]);

		Route::get('/preguntas/{id}/eliminar', [
			'as' => 'preguntas.confirmarEliminar',
			'uses' => 'PreguntasController@confirmarEliminar',
		]);

		Route::delete('/preguntas/{id}/eliminar', [
			'as' => 'preguntas.eliminar',
			'uses' => 'PreguntasController@eliminar',
		]);

	});

});

