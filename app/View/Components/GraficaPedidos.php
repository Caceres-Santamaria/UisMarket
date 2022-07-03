<?php

namespace App\View\Components;

use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class graficaPedidos extends Component
{
    public $entregados;
    public $cancelados;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $pedidos = DB::table('pedidos')
            ->where('estado', '4')
            ->orWhere('estado', '5')
            ->groupBy('estado')
            ->select([DB::raw('count(id) as cantidad'), 'estado'])
            ->get();
        $this->entregados = $pedidos->where('estado', '4')->pluck('cantidad')->first();
        $this->cancelados = $pedidos->where('estado', '5')->pluck('cantidad')->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.grafica-pedidos');
    }
}
