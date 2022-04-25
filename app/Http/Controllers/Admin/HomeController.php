<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tienda;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    $clientes = User::where('rol', '3')->count();
    $emprendedores = User::where('rol', '2')->count();
    $solicitudes = Tienda::where('estado', '0')->count();
    return view('admin.index', compact('clientes', 'emprendedores','solicitudes'));
  }
}
