<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class graficaCategorias extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $datos = DB::table('productos as p')
            ->join('categorias as c', 'c.id', '=', 'p.categoria_id')
            ->where('p.publicacion', '2')
            ->where('p.deleted_at', null)
            ->groupBy('p.categoria_id')
            ->select(['c.nombre', DB::raw('count(p.id) as cantidad')])
            ->orderBy('cantidad', 'desc')
            ->get();
        $categorias = implode(",", $datos->pluck('nombre')->all());
        $cantidades = implode(",", $datos->pluck('cantidad')->all());
        return view('components.grafica-categorias', compact('categorias', 'cantidades'));
    }
}
