<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(){
        $sort_by = request()->sort_by;
        $nombre = request()->nombre;
        return view('productos.index',compact(['sort_by','nombre']));
    }

    public function show(Producto $producto){
        return view('productos.show',compact('producto'));
    }
}
