<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;

class PromocionesFiltro extends Component
{
    use WithPagination;
    public $view = "grid";
    public $categoria = '';
    public $sort_by;

    protected $queryString = [
        'sort_by' => ['except' => ''],
        'categoria' => ['except' => '']
    ];

    public function mount($sort_by = '')
    {
        $this->sort_by = $sort_by;
    }

    public function busqueda()
    {
        if ($this->categoria == '') {
            $productos = productosPromociones($this->sort_by,$this->view);
        } else {
            $categoria_id = Categoria::where('slug',$this->categoria)->first()->id;
            $productos = categoriaProductosPromociones($this->sort_by,$categoria_id,$this->view);
        }
        return $productos;
    }

    public function render()
    {
        $productos = $this->busqueda();
        return view('livewire.promociones-filtro', compact('productos'));
    }
}
