<?php
namespace App\Repositories\Contracts;

interface PreguntasRepository
{
	/**
	 * @return Pregunta[]
	 */
	public function all();

	/**
	 * @return Pregunta[]
	 */
	public function withAllRelationships();

	/**
	 * @param int $id
	 * @return Pregunta
	 */
	public function find($id);

	/**
	 * @param array $data
	 */
	public function create($data);

	/**
	 * @param int $id
	 * @param array $data
	 */
	public function update($id, $data);

	/**
	 * @param int $id
	 */
	public function delete($id);
}