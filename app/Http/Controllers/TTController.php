<?php

namespace App\Http\Controllers;

class TTController extends Controller
{
    public function index()
    {
        comprobarCategoria();
        return view('TT');
    }
}
