<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class calificacionesController extends Controller
{
    public function index()
    {
        return view('calificaciones');
    }
}
