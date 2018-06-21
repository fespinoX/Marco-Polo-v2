<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class TipoUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        // Para ver si el usuario aceptó o no, vamos
        // a chequear 2 cosas:
        // 1. Si está tratando de entrar a una ruta de
        //  "ver detalles".
        // 2. Si tiene una variable de Session 'mayor18'
        //  seteada en true.

        // Verificamos si a esta ruta aplica el checkeo.
        // $request->routeIs verifica si el nombre de la
        // ruta cumple con el patrón.
        // if($request->routeIs('peliculas.detalles')) {
        // Verificamos si el tipo/a aceptó.
        if(Auth::user()->id_rol == 1) {
            Session::put('intended_url', $request->url());
            // Si no se verificó, lo mandamos al login
            return redirect()->route('login');
        }
        // }

        // Si todo está bien, siempre debemos terminar
        // haciendo este return.
        // Esta instrucción pasa la petición al siguiente
        // Middleware, o al Controller si no falta 
        // ninguno.
        return $next($request);
    }
}
