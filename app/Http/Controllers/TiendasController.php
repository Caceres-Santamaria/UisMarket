<?php

namespace App\Http\Controllers;

use App\Models\Tienda;

class TiendasController extends Controller
{

    public function index(){
        comprobarCategoria();
        $sort_by = request()->sort_by;
        return view('tiendas.index',compact('sort_by'));
    }

    public function show(Tienda $tienda){
        comprobarCategoria();
        return view('tiendas.show',compact('tienda'));
    }
}
