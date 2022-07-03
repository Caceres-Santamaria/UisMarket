<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tienda;
use Illuminate\Http\Request;

class ComentariosController extends Controller
{
    public function index(Tienda $tienda)
    {
        return view('admin.comentarios', compact('tienda'));
    }
}
