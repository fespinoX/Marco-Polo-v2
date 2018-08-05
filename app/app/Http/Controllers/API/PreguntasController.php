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
    	return response()->json($preguntas);
    }

    public function ver($id)
    {
    	$preguntas = Preguntas::find($id);
    	return response()->json($preguntas);
    }

    public function crear(Request $request)
    {
    	$inputData = $request->all();
		$request->validate(Preguntas::$rules);
    	$preguntas = Preguntas::create($inputData);

    	return response()->json([
    		'success' => true,
    		'data' => $preguntas
		]);
    }

    public function borrar($id)
    {
        $preguntas = Preguntas::find($id);
        $preguntas->delete();
        return response()->json($preguntas);
    }
}

