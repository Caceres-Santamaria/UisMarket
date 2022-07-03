<?php

namespace App\Http\Livewire\Emprendedor;

use App\Models\Pedido;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class Rotacion extends Component
{
    public $detalle_array, $tienda;
    public $detalle,$completeJson;
    public $search, $cantidad, $fecha_desde, $fecha_hasta;
    public $query = "select id,imagen,nombre,sum(cantidad) as cantidad,color,talla from JSON_TABLE(:detalle,'$[*]'COLUMNS(rowid FOR ORDINALITY,id int PATH '$.id',imagen varchar(255) PATH '$.options.image',nombre varchar(100) PATH '$.name',cantidad smallint PATH '$.qty',color varchar(100) PATH '$.options.color',talla varchar(100) PATH '$.options.talla')) as dt";
    protected $queryString = [
        'search' => ['except' => null, 'except' => ''],
        'fecha_desde' => ['except' => null, 'except' => ''],
        'fecha_hasta' => ['except' => null, 'except' => ''],
        'cantidad' => ['except' => null],
    ];

    protected $rules = [
        'cantidad' => 'in:asc,desc',
        'search' => 'string',
        'fecha_desde' => 'date|date_format:Y-m-d',
        'fecha_hasta' => 'date|date_format:Y-m-d'
    ];

    public function mount()
    {
        $this->tienda = auth()->user()->tienda->id;
        $pedidos = Pedido::where('tienda_id', $this->tienda)->where('estado', '4')->get(['detalle']);
        $detalle_array = array();
        foreach ($pedidos as $item) {
            $detalle_array = array_merge($detalle_array, json_decode($item->detalle));
        }
        $this->detalle_array = json_encode($detalle_array);
        $this->completeJson = $this->detalle_array;
        $this->detalle = DB::select($this->query . " GROUP BY id, talla, color", ['detalle' => $this->detalle_array]);

        $this->search = null;

        $this->cantidad = null;

        $this->fecha_desde = null;

        $this->fecha_hasta = null;
    }

    public function updatedFechaDesde()
    {
        Validator::make(
            ['fecha_desde' => $this->fecha_desde],
            ['fecha_desde' => 'date|date_format:Y-m-d'],
            [
                'date' => 'El :attribute debe ser una fecha',
                'date_format' => 'El :attribute debe tener el formato YYYY-mm-dd'
            ],
            ['fecha_desde' => 'Fecha Desde']
        )->validate();
    }

    public function updatedFechaHasta()
    {
        Validator::make(
            ['fecha_hasta' => $this->fecha_hasta],
            ['fecha_hasta' => 'date|date_format:Y-m-d'],
            [
                'date' => 'El :attribute debe ser una fecha',
                'date_format' => 'El :attribute debe tener el formato YYYY-mm-dd'
            ],
            ['fecha_hasta' => 'Fecha Desde']
        )->validate();
    }

    public function resetCantidad()
    {
        $this->cantidad = null;
    }

    public function resetFilters()
    {
        $this->fecha_desde = null;
        $this->fecha_hasta = null;
    }

    public function removeFilter($fechaType)
    {
        if($fechaType == 'desde'){
            $this->fecha_desde = null;
        }
        elseif($fechaType == 'hasta'){
            $this->fecha_hasta = null;
        }
    }

    public function sortBy()
    {
        $this->detalle = [];
        if ($this->cantidad != null) {
            if ($this->cantidad == 'asc') {
                $this->cantidad = 'desc';
            } else {
                $this->cantidad = null;
            }
        } else {
            $this->cantidad = 'asc';
        }
    }

    public function render()
    {
        if ($this->fecha_desde) {
            if ($this->fecha_hasta) {
                $pedidos = Pedido::where('tienda_id', $this->tienda)->where('estado', '4')->where('created_at','>',$this->fecha_desde." 00:00:00")->where('created_at','<',$this->fecha_hasta." 23:59:59")->get(['detalle']);
                $detalle_array = array();
                foreach ($pedidos as $item) {
                    $detalle_array = array_merge($detalle_array, json_decode($item->detalle));
                }
                $this->detalle_array = json_encode($detalle_array);
            } else {
                $pedidos = Pedido::where('tienda_id', $this->tienda)->where('estado', '4')->where('created_at','>',$this->fecha_desde." 00:00:00")->get(['detalle']);
                $detalle_array = array();
                foreach ($pedidos as $item) {
                    $detalle_array = array_merge($detalle_array, json_decode($item->detalle));
                }
                $this->detalle_array = json_encode($detalle_array);
            }
        } elseif ($this->fecha_hasta) {
            $pedidos = Pedido::where('tienda_id', $this->tienda)->where('estado', '4')->where('created_at','<',$this->fecha_hasta." 23:59:59")->get(['detalle']);
            $detalle_array = array();
                foreach ($pedidos as $item) {
                    $detalle_array = array_merge($detalle_array, json_decode($item->detalle));
                }
                $this->detalle_array = json_encode($detalle_array);
        }
        else{
            $this->detalle_array = $this->completeJson;
        }
        $this->detalle = DB::select($this->query . " GROUP BY id, talla, color HAVING nombre LIKE '%$this->search%' or color LIKE '%$this->search%' or talla LIKE '%$this->search%' ORDER BY cantidad $this->cantidad", ['detalle' => $this->detalle_array]);
        return view('livewire.emprendedor.rotacion', compact($this->detalle))
            ->layoutData(['title' => 'Informe rotación de productos']);
    }
}
