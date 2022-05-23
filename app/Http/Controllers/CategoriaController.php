<?php

namespace App\Http\Controllers;

use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function show(Categoria $categoria){
        comprobarCategoria();
        return view('categorias.show', compact('categoria'));
    }
}
