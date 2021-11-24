<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        comprobarCategoria();
        // $tiendasNew = Tienda::orderBy('created_at','asc')->take(10)->get();
        return view('home');
    }
}
