<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function index()
    {
        comprobarCategoria();
        return view('about');
    }
}
