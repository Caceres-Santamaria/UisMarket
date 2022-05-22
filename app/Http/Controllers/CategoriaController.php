<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function show(Categoria $categoria){
        comprobarCategoria();
        //esto debo borrar después
        return view('categorias.show', compact('categoria'));
    }
}
