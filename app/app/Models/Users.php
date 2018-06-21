<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{

	protected $table = "users";
	protected $primaryKey = "id";

	protected $fillable = [
        'name', 'planeta', 'foto',
    ];
	
	public static $rulesRegisterUser = [
		'name' => 'required|min:2|max:100',
        'planeta' => 'min:2|max:100',
        'password' => 'required|min:4|confirmed',
        'foto' => 'sometimes|image'
	];

	public static $rulesEditUser = [
		'name' => 'required|min:2|max:100',
        'planeta' => 'min:2|max:100',
        'foto' => 'sometimes|image'
	];

	public function preguntas()
    {
    	return $this->hasMany(Preguntas::class, 'id', 'id');
    }
}