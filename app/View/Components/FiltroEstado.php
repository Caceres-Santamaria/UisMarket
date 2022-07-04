<?php

namespace App\View\Components;

use App\Models\Producto;
use Illuminate\View\Component;

class FiltroEstado extends Component
{
    // public $filtros;
    public $sort;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($sort = 'todos')
    {
        $this->sort = $sort;
        // $this->filtros = array('todos', 'nuevo', 'usado');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.filtro-estado');
    }
}
