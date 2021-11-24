<?php

use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;

/**
 * comprueba que la sesion de categoria esté creada
 * si no está creada, se crean.
 */
function comprobarCategoria(){
    if(!request()->session()->has('categorias')){
    $categorias = Categoria::orderBy('nombre', 'asc')->get();
    session(['categorias' => $categorias]);
    }
}

function fondo($fondo_img)
{
    if($fondo_img)
    {
        $url = Storage::url($fondo_img);
        return "background-image:url('$url')";
    }
    else
    {
        return "background-color:rgb(186, 189, 194)";
    }
}

function splide($imagenProductos){
    if ($imagenProductos == 1){
        return 'false';
    }
    else{
        return 'true';
    }
}

function stock($cantidad){
    return ($cantidad <= 0) ? 'sin-stock' : 'con-stock';
}

function sortByActive($sort_by){
    return (request()->sort_by == $sort_by) ? 'bg-gray-300' : '';
}
