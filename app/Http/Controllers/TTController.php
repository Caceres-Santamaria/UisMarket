<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TTController extends Controller
{
    public function index()
    {
        comprobarCategoria();
        return view('TT');
    }
}
