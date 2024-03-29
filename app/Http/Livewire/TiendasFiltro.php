<?php

namespace App\Http\Livewire;

use App\Models\Tienda;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class TiendasFiltro extends Component
{
    use WithPagination;
    public $view = "grid";
    public $sort_by;
    public $busqueda = '';

    protected $queryString = [
        'sort_by' => ['except' => ''],
        'busqueda' => ['except' => '']
    ];

    public function updatingSortBy()
    {
        $this->resetPage();
    }

    public function updatingBusqueda()
    {
        $this->resetPage();
    }

    public function mount($sort_by = '')
    {
        $this->sort_by = $sort_by;
    }

    public function busqueda(){
        switch ($this->sort_by) {
            case '':
                if ($this->busqueda != '') {
                    $tiendas = Tienda::with('calificaciones')->where('nombre','LIKE',"%".$this->busqueda."%")->where('estado', '1')->orderBy('nombre', 'asc')->paginate(20);
                } else {
                    $tiendas = Tienda::with('calificaciones')->where('estado', '1')->orderBy('nombre', 'asc')->paginate(20);
                }
                break;
            case 'nombre_asc':
                if ($this->busqueda != '') {
                    $tiendas = Tienda::with('calificaciones')->where('nombre','LIKE',"%".$this->busqueda."%")->where('estado', '1')->orderBy('nombre', 'asc')->paginate(20);
                } else {
                    $tiendas = Tienda::with('calificaciones')->where('estado', '1')->orderBy('nombre', 'asc')->paginate(20);
                }
                break;
            case 'nombre_desc':
                if ($this->busqueda != '') {
                    $tiendas = Tienda::with('calificaciones')->where('nombre','LIKE',"%".$this->busqueda."%")->where('estado', '1')->orderBy('nombre', 'desc')->paginate(20);
                } else {
                    $tiendas = Tienda::with('calificaciones')->where('estado', '1')->orderBy('nombre', 'desc')->paginate(20);
                }
                break;
            case 'mas_reciente':
                if ($this->busqueda != '') {
                    $tiendas = Tienda::with('calificaciones')->where('nombre','LIKE',"%".$this->busqueda."%")->where('estado', '1')->orderBy('created_at', 'desc')->paginate(20);
                } else {
                    $tiendas = Tienda::with('calificaciones')->where('estado', '1')->orderBy('created_at', 'desc')->paginate(20);
                }
                break;
            case 'menos_recientes':
                if ($this->busqueda != '') {
                    $tiendas = Tienda::with('calificaciones')->where('nombre','LIKE',"%".$this->busqueda."%")->where('estado', '1')->orderBy('created_at', 'asc')->paginate(20);
                } else {
                    $tiendas = Tienda::with('calificaciones')->where('estado', '1')->orderBy('created_at', 'asc')->paginate(20);
                }
                break;
            case 'mejor_valoradas':
                if ($this->busqueda != '') {
                    $tiendas = Tienda::from('tiendas as tiendas')
                        ->join('pedidos as p', function ($join) {
                            $join->on('tiendas.id', '=', 'p.tienda_id');
                        })->join('calificaciones as c', function ($join) {
                            $join->on('p.id', '=', 'c.pedido_id');
                        })->select(DB::raw("tiendas.*,avg(c.calificacion) as calificaciones,count(c.calificacion) as total"))
                        ->where('p.estado', '4')
                        ->where('tiendas.estado', '1')
                        ->where('tiendas.nombre','LIKE',"%".$this->busqueda."%")
                        ->groupBy('id')
                        ->orderBy('calificaciones', 'desc')
                        ->paginate(20);
                } else {
                    $tiendas = Tienda::from('tiendas as tiendas')
                        ->join('pedidos as p', function ($join) {
                            $join->on('tiendas.id', '=', 'p.tienda_id');
                        })->join('calificaciones as c', function ($join) {
                            $join->on('p.id', '=', 'c.pedido_id');
                        })->select(DB::raw("tiendas.*,avg(c.calificacion) as calificaciones,count(c.calificacion) as total"))
                        ->where('p.estado', '4')
                        ->where('tiendas.estado', '1')
                        ->groupBy('id')
                        ->orderBy('calificaciones', 'desc')
                        ->paginate(20);
                }
                break;
            case 'menor_valoradas':
                if ($this->busqueda != '') {
                    $tiendas = Tienda::from('tiendas as tiendas')
                        ->join('pedidos as p', function ($join) {
                            $join->on('tiendas.id', '=', 'p.tienda_id');
                        })->join('calificaciones as c', function ($join) {
                            $join->on('p.id', '=', 'c.pedido_id');
                        })->select(DB::raw("tiendas.*,avg(c.calificacion) as calificaciones,count(c.calificacion) as total"))
                        ->where('p.estado', '4')
                        ->where('tiendas.estado', '1')
                        ->where('tiendas.nombre','LIKE',"%".$this->busqueda."%")
                        ->groupBy('id')
                        ->orderBy('calificaciones', 'asc')
                        ->paginate(20);
                } else {
                    $tiendas = Tienda::from('tiendas as tiendas')
                        ->join('pedidos as p', function ($join) {
                            $join->on('tiendas.id', '=', 'p.tienda_id');
                        })->join('calificaciones as c', function ($join) {
                            $join->on('p.id', '=', 'c.pedido_id');
                        })->select(DB::raw("tiendas.*,avg(c.calificacion) as calificaciones,count(c.calificacion) as total"))
                        ->where('p.estado', '4')
                        ->where('tiendas.estado', '1')
                        ->groupBy('id')
                        ->orderBy('calificaciones', 'asc')
                        ->paginate(20);
                }
                break;
            default:
                $tiendas = [];
        }
        return $tiendas;
    }

    public function render()
    {
        $tiendas = $this->busqueda();

        return view('livewire.tiendas-filtro', compact('tiendas'));
    }
}
