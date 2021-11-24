<?php

namespace App\Http\Controllers;

use App\Models\Tienda;
use Illuminate\Http\Request;

class tiendasController extends Controller
{
    public function index(){
        $sort_by = request()->sort_by;
        return view('tiendas.index',compact('sort_by'));
    }

    public function show(Tienda $tienda){
        return view('tiendas.show',compact('tienda'));
    }
}
