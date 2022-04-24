<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class GraficaPedidos extends Component
{
    public $entregados;
    public $cancelados;

    function mount()
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

    public function render()
    {
        return view('livewire.admin.grafica-pedidos');
    }
}
