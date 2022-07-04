<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
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

    public function updatingCategoria()
    {
        $this->resetPage();
    }

    public function updatingSortBy()
    {
        $this->resetPage();
    }

    public function updatingEstado()
    {
        $this->resetPage();
    }

    public function mount($sort_by = '')
    {
        $this->sort_by = $sort_by;
    }

    public function busqueda()
    {
        if ($this->categoria == '') {
            $productos = productos($this->sort_by, '', $this->view, $this->estado , null, true, null);
        } else {
            $categoria_id = Categoria::where('slug',$this->categoria)->first()->id;
            $productos = productos($this->sort_by, '', $this->view, $this->estado, $categoria_id, true, null);
        }
        return $productos;
    }

    public function render()
    {
        $productos = $this->busqueda();
        return view('livewire.promociones-filtro', compact('productos'));
    }
}
