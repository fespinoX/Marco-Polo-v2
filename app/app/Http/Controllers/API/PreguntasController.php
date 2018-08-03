<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Preguntas;

class PreguntasController extends Controller
{
    public function listar()
    {
    	$preguntas = Preguntas::all();

    	// Retornamos el JSON.
    	return response()->json($preguntas);
    }

    public function ver($id)
    {
    	// Buscamos la película por su id.
    	$preguntas = Preguntas::find($id);

    	return response()->json($preguntas);
    }

    public function crear(Request $request)
    {
    	$inputData = $request->all();

    	// Validación...
		$request->validate(Preguntas::$rules);

    	$preguntas = Preguntas::create($inputData);

    	return response()->json([
    		'success' => true,
    		'data' => $preguntas
		]);
    }
}
