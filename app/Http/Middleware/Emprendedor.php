<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Emprendedor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->user()->rol == 2){
            return $next($request);
        }
        else{
            return redirect()->route('home')->with('message','No tienes permiso de acceder a esta ruta');
        }
    }
}
