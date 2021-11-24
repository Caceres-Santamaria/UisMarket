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

    public function render()
    {
        if (!$this->categoria) {
            switch ($this->sort_by) {
                case '':
                    if ($this->nombre != '') {
                        $productos = Producto::where('nombre', 'LIKE', "%" . $this->nombre . "%")->orderBy('nombre', 'asc')->paginate(20);
                    } else {
                        $productos = Producto::orderBy('nombre', 'asc')->paginate(20);
                    }
                    break;
                case 'nombre_asc':
                    if ($this->nombre != '') {
                        $productos = Producto::where('nombre', 'LIKE', "%" . $this->nombre . "%")->orderBy('nombre', 'asc')->paginate(20);
                    } else {
                        $productos = Producto::orderBy('nombre', 'asc')->paginate(20);
                    }
                    break;
                case 'nombre_desc':
                    if ($this->nombre != '') {
                        $productos = Producto::where('nombre', 'LIKE', "%" . $this->nombre . "%")->orderBy('nombre', 'desc')->paginate(20);
                    } else {
                        $productos = Producto::orderBy('nombre', 'desc')->paginate(20);
                    }
                    break;
                case 'mas_reciente':
                    if ($this->nombre != '') {
                        $productos = Producto::where('nombre', 'LIKE', "%" . $this->nombre . "%")->orderBy('created_at', 'desc')->paginate(20);
                    } else {
                        $productos = Producto::orderBy('created_at', 'desc')->paginate(20);
                    }
                    break;
                case 'menos_recientes':
                    if ($this->nombre != '') {
                        $productos = Producto::where('nombre', 'LIKE', "%" . $this->nombre . "%")->orderBy('created_at', 'asc')->paginate(20);
                    } else {
                        $productos = Producto::orderBy('created_at', 'asc')->paginate(20);
                    }
                    break;
                default:
                    $productos = [];
            }
        } else {
            switch ($this->sort_by) {
                case '':
                    if ($this->nombre != '') {
                        $productos = Producto::where('categoria_id', $this->categoria->id)->where('nombre', 'LIKE', "%" . $this->nombre . "%")->orderBy('nombre', 'asc')->paginate(20);
                    } else {
                        $productos = Producto::where('categoria_id', $this->categoria->id)->orderBy('nombre', 'asc')->paginate(20);
                    }
                    break;
                case 'nombre_asc':
                    if ($this->nombre != '') {
                        $productos = Producto::where('categoria_id', $this->categoria->id)->where('nombre', 'LIKE', "%" . $this->nombre . "%")->orderBy('nombre', 'asc')->paginate(20);
                    } else {
                        $productos = Producto::where('categoria_id', $this->categoria->id)->orderBy('nombre', 'asc')->paginate(20);
                    }
                    break;
                case 'nombre_desc':
                    if ($this->nombre != '') {
                        $productos = Producto::where('categoria_id', $this->categoria->id)->where('nombre', 'LIKE', "%" . $this->nombre . "%")->orderBy('nombre', 'desc')->paginate(20);
                    } else {
                        $productos = Producto::where('categoria_id', $this->categoria->id)->orderBy('nombre', 'desc')->paginate(20);
                    }
                    break;
                case 'mas_reciente':
                    if ($this->nombre != '') {
                        $productos = Producto::where('categoria_id', $this->categoria->id)->where('nombre', 'LIKE', "%" . $this->nombre . "%")->orderBy('created_at', 'desc')->paginate(20);
                    } else {
                        $productos = Producto::where('categoria_id', $this->categoria->id)->orderBy('created_at', 'desc')->paginate(20);
                    }
                    break;
                case 'menos_recientes':
                    if ($this->nombre != '') {
                        $productos = Producto::where('categoria_id', $this->categoria->id)->where('nombre', 'LIKE', "%" . $this->nombre . "%")->orderBy('created_at', 'asc')->paginate(20);
                    } else {
                        $productos = Producto::where('categoria_id', $this->categoria->id)->orderBy('created_at', 'asc')->paginate(20);
                    }
                    break;
                default:
                    $productos = [];
            }
        }

        return view('livewire.productos-filtro', compact('productos'));
    }
}
