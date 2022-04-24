<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tienda;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $clientes = User::whereIn('rol', ['2', '3'])->count();
        $emprendedores = Tienda::where('estado', '1')->count();
        $solicitudes = Tienda::where('estado', '0')->count();
        return view('admin.index', compact('clientes', 'emprendedores', 'solicitudes'));
    }
}
