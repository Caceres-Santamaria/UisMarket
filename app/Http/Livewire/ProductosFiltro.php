<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;

class ProductosFiltro extends Component
{
    use WithPagination;
    public $view = "grid";
    public $categoria;
    public $sort_by;
    public $nombre = '';

    protected $queryString = [
        'sort_by' => ['except' => ''],
        'nombre' => ['except' => '']
    ];

    public function mount($categoria = null, $sort_by = '', $nombre = '')
    {
        $this->categoria = $categoria;
        $this->sort_by = $sort_by;
        $this->nombre = $nombre;
    }

    public function busqueda()
    {
        if (!$this->categoria) {
            $productos = productos($this->sort_by, $this->nombre, $this->view);
        } else {
            $productos = categoriaProductos($this->sort_by, $this->nombre, $this->categoria, $this->view);
        }
        return $productos;
    }

    public function render()
    {
        $productos = $this->busqueda();
        return view('livewire.productos-filtro', compact('productos'));
    }
}
