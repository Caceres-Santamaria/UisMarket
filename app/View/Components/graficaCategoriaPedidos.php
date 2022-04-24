<?php

namespace App\View\Components;

use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class graficaCategoriaPedidos extends Component
{
    // public $data;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $data = DB::table('pedidos as pe')
            ->join('productos as p', 'p.id', '=', DB::raw("(JSON_VALUE(pe.detalle, '$[*].id'))"))
            ->join('categorias as c', 'c.id', '=', 'p.categoria_id')
            ->groupBy('p.categoria_id')
            ->get(['c.nombre', DB::raw("sum(JSON_VALUE(pe.detalle, '$[*].qty')) as cantidad")]);
        $categorias = Categoria::all(['nombre'])->pluck('nombre')->all();
        $cantidades = [];
        foreach ($categorias as $categoria) {
            $category = $data->where('nombre', $categoria)->first();
            if ($category) {
                array_push($cantidades, $category->cantidad);
            } else {
                array_push($cantidades, 0);
            }
        }
        $categorias = implode(",", $categorias);
        $cantidades = implode(",", $cantidades);


        // dd($categorias,$cantidades);
        return view('components.grafica-categoria-pedidos', compact('categorias', 'cantidades'));
    }
}
