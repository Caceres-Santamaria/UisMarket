<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class politicaController extends Controller
{
    public function index()
    {
        comprobarCategoria();
        return view('politicapriv');
    }
}
