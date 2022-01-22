<?php

namespace App\Http\Controllers;

use App\Models\Tienda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        comprobarCategoria();

        $destacadas = Tienda::from('tiendas as tiendas')
        ->join('pedidos as p', function ($join) {
            $join->on('tiendas.id', '=', 'p.tienda_id');
        })->join('calificaciones as c', function ($join) {
            $join->on('p.id', '=', 'c.pedido_id');
        })->select(DB::raw("tiendas.*,avg(c.calificacion) as calificaciones,count(c.calificacion) as total"))
        ->where('p.estado', '4')
        ->groupBy('id')
        ->orderBy('calificaciones', 'desc')
        ->take(10)
        ->get();

        $nuevas = Tienda::orderBy('created_at', 'desc')->take(10)->get();
        // $tiendasNew = Tienda::orderBy('created_at','asc')->take(10)->get();
        return view('home',compact('destacadas','nuevas'));
    }
}
