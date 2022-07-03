<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Producto;
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

    protected $queryString = [
        'sort_by' => ['except' => ''],
        'categoria' => ['except' => ''],
        'estado' => ['except' => 'todos']
    ];

    public function mount($tienda)
    {
        $this->sort_by = '';
        $this->categoria = '';
        $this->tienda = $tienda;
        $categorias = DB::table('productos')->distinct()->where('tienda_id',$this->tienda->id)->pluck('categoria_id');
        $ids = array();
        $loop = 0;
        foreach($categorias as $categoria){
            $ids[$loop] = $categoria;
            $loop++;
        }
        $this->categorias = Categoria::whereIn('id',$ids)->orderBy('nombre','asc')->get(['id','slug', 'nombre']);
    }

    public function busqueda()
    {
        if ($this->categoria == '') {
            $productos = productos($this->sort_by, '', $this->view, $this->estado, null, null, $this->tienda->id);
        } else {
            $categoria_id = Categoria::where('slug',$this->categoria)->first(['id','slug', 'nombre'])->id;
            $productos = productos($this->sort_by, '', $this->view, $this->estado, $categoria_id, null, $this->tienda->id);
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
