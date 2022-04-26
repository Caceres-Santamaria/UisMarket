<?php

namespace App\Http\Controllers\Emprendedor;

use App\Http\Controllers\Controller;
use App\Models\Tienda;
use Illuminate\Http\Request;

class TiendaController extends Controller
{
    public function __construct()
    {
        $this->middleware('is.tienda.activa')->except('activar');
    }

    public function show(){

        return view('tiendas.show',['tienda' => auth()->user()->tienda]);
    }

    public function activar(){
        Tienda::withTrashed()->where('user_id',auth()->user()->id)->restore();
        return redirect()->route('tienda.show');
    }

    public function desactivar(){
        Tienda::where('user_id', auth()->user()->id)->delete();
        return redirect()->route('home')->with('message','Tienda desactivada exitosamente');
    }
}
