<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class ProductosFiltro extends Component
{
    use WithPagination;
    public $view = "grid";
    public $categoria;
    public $sort_by;
    public $nombre = '';
    public $estado = 'todos';

    protected $queryString = [
        'sort_by' => ['except' => ''],
        'nombre' => ['except' => ''],
        'estado' => ['except' => 'todos']
    ];

    public function updatingSortBy()
    {
        $this->resetPage();
    }

    public function updatingNombre()
    {
        $this->resetPage();
    }

    public function updatingEstado()
    {
        $this->resetPage();
    }

    public function mount($categoria = null, $sort_by = '', $nombre = '')
    {
        $this->categoria = $categoria;
        $this->sort_by = $sort_by;
        $this->estado = 'todos';
        $this->nombre = $nombre;
    }

    public function busqueda()
    {
        if (!$this->categoria) {
            $productos = productos($this->sort_by, $this->nombre, $this->view, $this->estado , null, false, null);
        } else {
            $productos = productos($this->sort_by, $this->nombre, $this->view, $this->estado, $this->categoria->id, false, null);
        }
        return $productos;
    }

    public function render()
    {
        $productos = $this->busqueda();
        return view('livewire.productos-filtro', compact('productos'));
    }
}
