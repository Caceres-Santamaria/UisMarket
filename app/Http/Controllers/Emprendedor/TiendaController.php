<?php

namespace App\Http\Controllers\Emprendedor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TiendaController extends Controller
{
    public function show(){

        return view('tiendas.show',['tienda' => auth()->user()->tienda]);
    }
}
