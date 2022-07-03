<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SuperAdmin
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
        if($request->user()->rol == 0){
            return $next($request);
        }
        else{
            return redirect()->route('admin.dashboard')->with('message','No tienes permiso de acceder a esta ruta');
        }
    }
}
