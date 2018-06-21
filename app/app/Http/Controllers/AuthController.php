<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Users;
use Auth;
use Storage;
use Session;
use Image;

class AuthController extends Controller
{

    public function showRegistro()
    {
        return view('auth.registro');
    }

    public function doRegistro(Request $request)
    {

        $request->validate(Users::$rulesRegisterUser, [
            'name.required'=>"No tenés nombre?", 
            'name.min'=>"Este nombre es muy cortito, ponele al menos :min letritas", 
            'name.max'=>"Nadie tiene un nombre taaan largo. Máximo :max letritas", 
            'planeta.required'=>"De dónde venís?",
            'planeta.min'=>"Este planeta es muy cortito, ponele al menos :min letritas", 
            'planeta.max'=>"Nadie vive en un planeta taaan largo. Máximo :max letritas",
            'email.required'=>"Poné tu mail, astro.",
            'email.email'=>"Eso no estaría siendo un mail..",
            'password.required'=>"Y la password?",
            'password.min'=>"Ponele al menos :min letritas",
            'password.confirmed'=>"Las contraseñas no coinciden.."
        ]);


        // Grabamos el usuario.
        // Primero, muy importante, tenemos que HASHEAR
        // el password.
        $input = $request->input();

        $input['password'] = \Hash::make($input['password']);
        $user = User::create($input);

        return redirect('/login')
            //->route('auth.showLogin')
            ->with('status', 'Ya estás registrado, astro! ahora logueate ;)');
    }


    public function showLogin()
    {
    	return view('auth.login');
    }

    public function doLogin(Request $request)
    {

        $request->validate(Users::$rulesLoginUser, [
            'email.required'=>"Y el mail?", 
            'email.max'=>"Ese mail es muy largo, creo que le pifiaste", 
            'email.mail'=>"Eso no es un mail, corazón..",            
            'password.required'=>"Y la password?", 
            'password.min'=>"Esa password es muy cortita, ponele al menos :min letritas", 
        ]);        


    	$input = $request->input();




		if(!Auth::attempt(['password' => $input['password'], 'email' => $input['email']])) {
			// Error
			return redirect()->route('login')
				->withInput()
				->with('status', 'OH NO! Algo salió mal ¯\_(ツ)_/¯');
		}



//esto checkea el rol

        if(Auth::user()->id_rol == 1){
            Session::put('rolusuario', true);
        }

		return redirect()->intended('/index');

    }

    public function logout()
    {   

        // vacía el session para sacar el rolusuario ¯\_(ツ)_/¯
        session()->flush();

    	Auth::logout();
    	return redirect('/index');
    }


    public function showPanel()
    {
        return view('paneluser');
    }   


    public function userEditar(Request $request, $id)
    {
        //dd($inputData);
        $request->validate(Users::$rulesEditUser, [
            'name.required'=>"No tenés nombre?", 
            'name.min'=>"Este nombre es muy cortito, ponele al menos :min letritas", 
            'name.max'=>"Nadie tiene un nombre taaan largo. Máximo :max letritas", 
            'planeta.required'=>"De dónde venís?",
            'planeta.min'=>"Este planeta es muy cortito, ponele al menos :min letritas", 
            'planeta.max'=>"Nadie vive en un planeta taaan largo. Máximo :max letritas",
            'foto.image'=>"Tiene que ser una foto, capo."
        ]);

        $inputData = $request->input();

        if($request->hasFile('foto')) {


            $img = Image::make($request->file('foto'));
            if($img->width() > $img->height()) {
                $img->widen(300);
            } else {
                $img->heighten(300);
            }


            $filepath = $request->file('foto')->hashName('imgs');

            Storage::put('img/' . $filepath, (string) $img->encode());

            $inputData['foto'] = $filepath;
        }

        $usuario = Users::find($id);
        $imagen = $usuario->foto;

        

        $usuario->update($inputData);

        
        if ($imagen) {
            Storage::delete($imagen);
        }

        return back()->with('status', 'Listo, editaste tu perfil!');
    }






    
}
