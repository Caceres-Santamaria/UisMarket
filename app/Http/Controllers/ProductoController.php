<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    public function index(){
        comprobarCategoria();
        $sort_by = request()->sort_by;
        $nombre = request()->nombre;
        return view('productos.index',compact(['sort_by','nombre']));
    }

    public function show($producto){
        comprobarCategoria();
        $producto = Producto::with(['colores','tallas'])->whereRelation('tienda','deleted_at',null)->where('slug',$producto)->firstOrFail();
        return view('productos.show',compact('producto'));
    }

    public function promociones(){
        comprobarCategoria();
        $sort_by = request()->sort_by;
        $nombre = request()->nombre;
        return view('productos.promociones',compact(['sort_by','nombre']));
    }

}
