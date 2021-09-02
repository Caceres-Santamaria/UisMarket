<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tiendasController extends Controller
{
    public function index(){
        return view('tiendas');
    }
}
