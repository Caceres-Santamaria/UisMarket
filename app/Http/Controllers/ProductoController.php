<?php

namespace App\Http\Controllers;

use App\Models\Producto;

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
        $slug = $producto;
        $producto = Producto::with(['colores','tallas'])
            ->whereRelation('tienda','deleted_at',null)
            ->whereRelation('categoria','deleted_at',null)
            ->where('publicacion', '2')
            ->where('slug',$slug)
            ->firstOrFail();

        if($producto) {
            $productosRelacionados = Producto::whereRelation('tienda','deleted_at',null)
            ->whereRelation('categoria','deleted_at',null)
            ->where('slug','<>',$slug)
            ->where('tienda_id',$producto->tienda_id)
            ->where('publicacion', '2')
            ->take(10)
            ->get();
        } else {
            $productosRelacionados = collect([]);
        }
        return view('productos.show',compact('producto','productosRelacionados'));
    }

    public function promociones(){
        comprobarCategoria();
        $sort_by = request()->sort_by;
        $nombre = request()->nombre;
        return view('productos.promociones',compact(['sort_by','nombre']));
    }

}
