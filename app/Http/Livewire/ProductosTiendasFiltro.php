<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ProductosTiendasFiltro extends Component
{
    use WithPagination;
    public $view = "grid";
    public $categoria = '';
    public $categorias;
    public $sort_by = '';
    public $tienda;
    public $estado = "todos";
    public $admin;

    protected $queryString = [
        'sort_by' => ['except' => ''],
        'categoria' => ['except' => ''],
        'estado' => ['except' => 'todos']
    ];

    public function updatingSortBy()
    {
        $this->resetPage();
    }

    public function updatingEstado()
    {
        $this->resetPage();
    }

    public function updatingCategoria()
    {
        $this->resetPage();
        $this->reset('estado');
    }

    public function mount($tienda)
    {
        $this->admin = Auth::check() ? ((auth()->user()->rol == '0' || auth()->user()->rol == '1') ? true : false) : false;
        $this->sort_by = '';
        $this->categoria = '';
        $this->tienda = $tienda;
        if($this->admin) {
            $categorias = Producto::whereRelation('categoria', 'deleted_at', null)->whereRelation('tienda', 'deleted_at', null)->where('publicacion', '2')->where('tienda_id', $this->tienda->id)->pluck('categoria_id');
        } else {
            $categorias = Producto::whereRelation('categoria', 'deleted_at', null)->whereRelation('tienda', 'deleted_at', null)->where('publicacion', '2')->where('tienda_id', $this->tienda->id)->whereRelation('tienda', 'estado', '1')->pluck('categoria_id');
        }
        // $categorias1 = DB::table('productos')->distinct()->where('tienda_id',$this->tienda->id)->where('publicacion','2')->pluck('categoria_id');
        // dd($categorias->unique()->all(),$categorias1->unique()->all());
        $this->categorias = Categoria::whereIn('id',$categorias->unique()->all())->orderBy('nombre','asc')->get(['id','slug', 'nombre']);
    }

    public function busqueda()
    {
        if ($this->categoria == '') {
            $productos = productosTienda($this->sort_by, $this->view, $this->tienda->id, $this->estado, $this->admin);
        } else {
            $categoria_id = $this->categorias->where('slug',trim($this->categoria))->first();
            if($categoria_id) {
                $categoria_id = $categoria_id->id;
            } else {
                $categoria_id = null;
            }
            $productos = categoriaProductosTienda($this->sort_by, $this->view, $this->tienda->id, $this->estado, $categoria_id, $this->admin);
        }
        return $productos;
    }

    public function render()
    {
        // return view('livewire.productos-tiendas-filtro');
        $productos = $this->busqueda();
        return view('livewire.productos-tiendas-filtro', compact('productos'));
    }
}
