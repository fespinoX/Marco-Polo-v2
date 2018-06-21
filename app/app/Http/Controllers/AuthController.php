<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Users;
use Auth;

class AuthController extends Controller
{

    public function showRegistro()
    {
        return view('auth.registro');
    }

    public function doRegistro(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:100',
            'email' => 'required|email|max:255|unique:users',
            'planeta' => 'min:2|max:100',
            'password' => 'required|min:4|confirmed',
        ]);

        // Grabamos el usuario.
        // Primero, muy importante, tenemos que HASHEAR
        // el password.
        $input = $request->input();

        $input['password'] = \Hash::make($input['password']);
        $user = User::create($input);

        return redirect('/index')
            //->route('auth.showLogin')
            ->with('status', 'Usuario registrado con éxito!');
    }


    public function showLogin()
    {
    	return view('auth.login');
    }

    public function doLogin(Request $request)
    {
    	$request->validate([
    		'email' => 'required|max:255',
    		'password' => 'required|min:3',
		]);


    	$input = $request->input();




		if(!Auth::attempt(['password' => $input['password'], 'email' => $input['email']])) {
			// Error
			return redirect()->route('login')
				->withInput()
				->with('status', 'OH NO! Algo salió mal ¯\_(ツ)_/¯');
		}


		return redirect()->intended('/index');
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/index');
    }






    public function showPanel()
    {
        return view('paneluser');
    }   


    public function userEditar(Request $request, $id)
    {

        $request->validate(Users::$rulesEditUser, [
            'name.required'=>"No tenés nombre?", 
            'name.min'=>"Este nombre es muy cortito, ponele al menos :min letritas", 
            'name.max'=>"Nadie tiene un nombre taaan largo. Máximo :max letritas", 
            'planeta.min'=>"Este planeta es muy cortito, ponele al menos :min letritas", 
            'planeta.max'=>"Nadie vive en un planeta taaan largo. Máximo :max letritas",
            'foto.image'=>"Tiene que ser una foto, capo."
        ]);

        $inputData = $request->input();

        Users::find($id)->update($inputData);

        return back()->with('status', 'Listo, editaste tu perfil!');
    }

    
}
