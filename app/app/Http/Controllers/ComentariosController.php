<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentarios;
use App\Models\Preguntas;

class ComentariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Crea un nuevo comentario
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request, $id)
    {
        $inputData = $request->all();
        $inputData['id_user'] = auth()->id();
        $inputData['id_pregunta'] = $id;
        //dd($inputData);

        $request->validate(Comentarios::$rules, [
            'comentario.required' => 'Debe escribir algún comentario antes de enviar',
            'comentario.min' => 'Debe poner al menos 5 caracteres',
            'comentario.max' => 'Se excedió en la cantidad de caracteres. Máximo 255'
        ]);

        Comentarios::create($inputData);
        return back()->with('status', 'El comentario se guardó correctamente');
    }


    /**
     * Borra un comentario de la base
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function confirmarEliminarComentario($id){
        $singleComentario = Comentarios::find($id);
        return view('preguntas.confirmarEliminarComentario', compact('singleComentario'));
    }


    public function eliminar($id){
        $singleComentario = Comentarios::find($id);
        $singleComentario->delete();
        
        return redirect(url('/preguntas'))->with('status', 'El comentario se eliminó correctamente');
    }

}
