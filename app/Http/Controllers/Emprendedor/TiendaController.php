<?php

namespace App\Http\Controllers\Emprendedor;

use App\Http\Controllers\Controller;
use App\Models\Tienda;
use Illuminate\Http\Request;

class TiendaController extends Controller
{
    public function show(){

        return view('tiendas.show',['tienda' => auth()->user()->tienda]);
    }

    public function activar(){
        Tienda::withTrashed()->where('user_id',auth()->user()->id)->restore();
        redirect()->back();
    }

    public function desactivar(){
        Tienda::where('user_id', auth()->user()->id)->delete();
        redirect()->route('home');
    }
}
