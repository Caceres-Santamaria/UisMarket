<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PoliticaController extends Controller
{
    public function index()
    {
        comprobarCategoria();
        return view('politicapriv');
    }
}
