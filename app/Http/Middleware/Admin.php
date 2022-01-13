<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
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
        if($request->user()->rol == 1){
            return $next($request);
        }
        else{
            return redirect()->route('home')->with('message','No tienes permiso de acceder a esta ruta');
        }
    }
}
