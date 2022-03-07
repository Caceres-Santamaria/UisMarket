<?php

namespace App\View\Components;

use App\Models\Categoria;
use Illuminate\View\Component;

class filtroCategoria extends Component
{
    public $filtros;
    public $sort;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($sort = 'Promociones')
    {
        $this->sort = $sort;
        $this->filtros = array('Productos' => '');
        if (session()->has('categorias')):
            foreach(session('categorias') as $categoria):
                $this->filtros[$categoria->nombre] = $categoria->slug;
            endforeach;
        else:
            session(['categorias' => Categoria::orderBy('nombre', 'asc')->get()]);
            foreach(session('categorias') as $categoria):
                $this->filtros[$categoria->nombre] = $categoria->slug;
            endforeach;
        endif;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.filtro-categoria');
    }
}
