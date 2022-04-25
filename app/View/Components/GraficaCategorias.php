<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class graficaCategorias extends Component
{
    public $categorias;
    public $cantidades;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $datos = DB::table('productos as p')
            ->join('categorias as c', 'c.id', '=', 'p.categoria_id')
            ->where('p.publicacion', '2')
            ->where('p.deleted_at', null)
            ->groupBy('p.categoria_id')
            ->select(['c.nombre', DB::raw('count(p.id) as cantidad')])
            ->orderBy('cantidad', 'desc')
            ->get();
        $this->categorias = implode(",", $datos->pluck('nombre')->all());
        $this->cantidades = implode(",", $datos->pluck('cantidad')->all());
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.grafica-categorias');
    }
}
