<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Tienda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TiendasController extends Controller
{
    public function index(){
        $sort_by = request()->sort_by;
        return view('tiendas.index',compact('sort_by'));
    }

    public function show(Tienda $tienda){
        // $categorias = Categoria::whereIn('id',[DB::table('productos')->distinct()->where('tienda_id',$tienda->id)->pluck('categoria_id')])->orderBy('nombre','desc')->get();
        return view('tiendas.show',compact('tienda'));
    }
}
