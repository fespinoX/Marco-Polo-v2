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

    public static $rulesLoginUser = [
		'email' => 'required|max:255|email',
    	'password' => 'required|min:3',
	];

	
	public static $rulesRegisterUser = [
		'name' => 'required|min:2|max:100',
		'planeta' => 'required|min:2|max:100',
		'email' => 'required|email',
        'password' => 'required|min:4|confirmed',
	];

	public static $rulesEditUser = [
		'name' => 'required|min:2|max:100',
        'planeta' => 'required|min:2|max:100',
        'foto' => 'sometimes|image'
	];

	public function preguntas()
    {
    	return $this->hasMany(Preguntas::class, 'id', 'id');
    }
}