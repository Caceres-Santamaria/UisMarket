<?php

namespace App\View\Components;

use App\Models\Producto;
use App\Models\Tienda;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class slider extends Component
{
    public $id;
    public $productos;
    public $tipo;
    public $nuevas;
    public $destacadas;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $tienda = null, $tipo = "productos")
    {
        $this->id = $id;
        $this->tipo = $tipo;
        switch ($tipo) {
            case 'productos':
                $this->productos = Producto::where('tienda_id', $tienda)->take(10)->get();
                break;
            case 'destacadas':
                $this->destacadas = Tienda::from('tiendas as tiendas')
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
                break;
            case 'nuevas':
                $this->nuevas = Tienda::orderBy('created_at', 'desc')->take(10)->get();
                break;
            default:
                $this->productos = Producto::where('tienda_id', $tienda)->take(10)->get();
                break;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.slider');
    }
}
