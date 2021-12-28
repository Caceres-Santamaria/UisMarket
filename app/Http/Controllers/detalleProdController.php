<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class detalleProdController extends Controller
{
    public function index()
    {
        return view('detalleProducto');
    }
}
