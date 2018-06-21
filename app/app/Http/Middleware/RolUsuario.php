<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class RolUsuario
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
        if(!Session::has('rolusuario')) {
            Session::put('intended_url', $request->url());
            return redirect(url('/index'));
        }

        return $next($request);
    }
}
