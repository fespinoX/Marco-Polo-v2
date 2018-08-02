<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comentarios extends Model
{
	protected $table = "comentarios";
	protected $primaryKey = "id_comentario";
    protected $fillable = ['comentario', 'id_pregunta', 'id_user'];
	
    public static $rules = [
		'comentario' => 'required|min:5|max:400',
	];

	public function preguntas(){
		return $this->belongsTo(Preguntas::class, 'id_pregunta', 'id_pregunta' );
	}
	
}
