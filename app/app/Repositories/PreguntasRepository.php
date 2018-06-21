<?php
namespace App\Repositories;

use App\Repositories\Contracts\PreguntasRepository as RepoContract;
use App\Models\Preguntas;


/*
En el repo, vamos a empezar por pedir que en su construcción nos pasen una instancia de Preguntas.
*/
class PreguntasRepository implements RepoContract
{
	/** @var Preguntas */
	protected $pregunta;

	/**
	 * @param Preguntas $pregunta
	 */
	public function __construct(Preguntas $pregunta)
	{
		$this->pregunta = $pregunta;
	}

	/**
	 * @return Preguntas[]
	 */
	public function all()
	{
		return Preguntas::all();
	}

	/**
	 * @return Preguntas[]
	 */
	public function withAllRelationships()
	{
		return Preguntas::with('categorias', 'users')->get();
	}

	/**
	 * @param int $id
	 * @return Preguntas
	 */
	public function find($id)
	{
		return Preguntas::find($id);
	}


	/**
	 * @param array $data
	 */
	public function create($data)
	{
		return Preguntas::create($data);
	}

	/**
	 * @param int $id
	 * @param array $data
	 */
	public function update($id, $data)
	{
		return Preguntas::find($id)->update($data);
	}

	/**
	 * @param int $id
	 */
	public function delete($id)
	{
		return Preguntas::find($id)->delete();
	}
}