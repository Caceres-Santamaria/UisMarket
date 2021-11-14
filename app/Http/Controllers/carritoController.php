<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class carritoController extends Controller
{
  public function index(){
    return view('carrito');
  }
}
