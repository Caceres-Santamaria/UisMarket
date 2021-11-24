<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class aboutController extends Controller
{
  public function index(){
    return view('emprendedor.crear_prod');
}
}
