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
    public $estado = "todos";

    protected $queryString = [
        'sort_by' => ['except' => ''],
        'categoria' => ['except' => ''],
        'estado' => ['except' => 'todos']
    ];

    public function mount($sort_by = '')
    {
        $this->sort_by = $sort_by;
    }

    public function busqueda()
    {
        if ($this->categoria == '') {
            $productos = productos($this->sort_by, '', $this->view, $this->estado , null, null, null);
        } else {
            $categoria_id = Categoria::where('slug',$this->categoria)->first()->id;
            $productos = productos($this->sort_by, '', $this->view, $this->estado, $categoria_id, null, null);
        }
        return $productos;
    }

    public function render()
    {
        $productos = $this->busqueda();
        return view('livewire.promociones-filtro', compact('productos'));
    }
}
