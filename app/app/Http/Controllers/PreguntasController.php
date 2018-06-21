<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preguntas;
use App\Models\Categorias;
use App\Repositories\Contracts\PreguntasRepository;




class PreguntasController extends Controller
{
    /** @var PeliculaRepository */
    protected $repo;

    /**
     * Le pedimos a Laravel que nos inyecte el repo
     * que registramos en el inyector de dependencias
     * en el método register de AppServiceProvider.
     *
     * @param PeliculaRepository $repo
     */
    public function __construct(PreguntasRepository $repo)
    {
        $this->repo = $repo;
    }




    public function index()
    {

        $preguntas = $this->repo->withAllRelationships();

        return view('preguntas/listapreguntas', [
            'preguntas' => $preguntas
        ]);
    }

    public function detallepregunta($id_pregunta)
    {

        $pregunta = $this->repo->find($id_pregunta);


    	return view('preguntas.detallepregunta', [
    		'pregunta' => $pregunta
		]);
    }



    public function formAlta()
    {
        $categorias = Categorias::all();
        $categoriasSelect = array_pluck($categorias, 'categoria', 'id_categoria');
        return view(
            'preguntas.altapregunta', 
            compact('categorias', 'categoriasSelect')
        );
    }

    public function crear(Request $request)
    {
        $inputData = $request->all();
        $inputData["respondida"] = false;

        $request->validate(Preguntas::$rules, [
            'pregunta.required' => 'La pregunta no puede estar vacía',
            'pregunta.min' => 'Esa pregunta es muy cortita, no seas vago!'
        ]);

        $this->repo->create($inputData);

        return redirect()->route('preguntas.index');
    }



   public function formEditar($id)
    {
        $pregunta = Preguntas::find($id);
        $categorias = Categorias::all();

        $categoriasSelect = array_pluck($categorias, 'categoria', 'id_categoria');
        return view(
            'preguntas.form-editar', 
            compact('categorias', 'categoriasSelect', 'pregunta')
        );
    }

    public function editar(Request $request, $id)
    {

        $inputData = $request->input();
        $inputData["respondida"] = true;

        $this->repo->update($id, $inputData);

        return redirect()->route('preguntas.index')
            ->with('status', 'Se agregó la respuesta');
    }

    public function confirmarEliminar($id)
    {
        $pregunta = Preguntas::find($id);

        return view('preguntas.confirmarEliminar', compact('pregunta'));
    }

    public function eliminar($id)
    {

        $this->repo->delete($id);


        return redirect()->route('preguntas.index');
    }
}










