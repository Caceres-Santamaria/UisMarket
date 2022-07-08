<?php

namespace App\Http\Livewire;

use App\Models\Ciudad;
use App\Models\Departamento;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Tienda;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CrearPedido extends Component
{
    public $costo = 0;
    public $contacto, $telefono, $direccion, $referencia;
    public $costos_envio = [], $tipos_envio = [];
    public $departamentos, $ciudades = [];
    public $departamento_id = "", $ciudad_id = "";

    protected $rules = [
        'contacto' => ['required', 'string', 'min:8'],
        'telefono' => ['required', 'digits:10'],
        'direccion' => ['required', 'string', 'min:8'],
        'referencia' => ['nullable'],
        'departamento_id' => [
            'required',
            // 'in:'.implode(",",$this->departamentos->pluck("id")->all())],
            // Rule::in($this->departamentos->pluck("id"))
        ],
        'ciudad_id' => ['required'],
    ];

    public function mount()
    {
        $tiendas_array = array_keys(Cart::content()->groupBy('options.tienda_id')->all());
        foreach ($tiendas_array as $tienda_id) {
            $this->costos_envio[$tienda_id] = null;
            $this->tipos_envio[$tienda_id] = null;
        }
        $this->departamentos = Departamento::all();
    }

    // public function updated($item){
    //     $this->validateOnly($item);
    // }

    public function updatedDepartamentoId($value)
    {
        $this->ciudades = Ciudad::where('departamento_id', $value)->get();
        $this->reset(['ciudad_id']);
    }

    public function updatedCiudadId($value)
    {
        $tiendas_array = array_keys(Cart::content()->groupBy('options.tienda_id')->all());
        foreach ($tiendas_array as $tienda_id) {
            $this->costos_envio[$tienda_id] = null;
            $this->tipos_envio[$tienda_id] = null;
        }
        $this->costo = 0;
        $this->dispatchBrowserEvent('limpiar');
    }

    public function updateCosto($tienda, $costo, $tipo)
    {
        $this->costos_envio[$tienda] = $costo;
        $this->costo = array_sum($this->costos_envio);
        $this->tipos_envio[$tienda] = $tipo;
    }

    public function total($productos)
    {
        $qty = $productos->pluck('qty')->all();
        $price = $productos->pluck('price')->all();
        $resultado = array_values(array_map(function ($a1, $a2) {
            return $a1 * $a2;
        }, $qty, $price));
        return array_sum($resultado);
    }

    public function validarEnvios($tiendas)
    {
        foreach ($tiendas as $tienda_id) {
            if ($this->costos_envio[$tienda_id] === null) {
                return $tienda_id;
            }
        }
        return null;
    }

    public function save()
    {
        $this->dispatchBrowserEvent('ir_arriba');
        $this->validate();
        $productosT = Cart::content()->groupBy('options.tienda_id')->all();
        $tienda_id = $this->validarEnvios(array_keys($productosT));
        if ($tienda_id == null) {
            if ($this->comprobarDisponibilidad()) {
                return redirect()->route('carrito')->with('message','2');
            } else {
                $pedidos = array();
                $fecha = Carbon::now();
                foreach ($productosT as $tienda => $productos) {
                    array_push($pedidos, [
                        'envio' => json_encode(
                            [
                                'contacto' => $this->contacto,
                                'telefono' => $this->telefono,
                                'direccion' => $this->direccion,
                                'referencia' => $this->referencia
                            ]
                        ),
                        'costo_envio' => $this->costos_envio[$tienda],
                        'descuento' => 0,
                        'total' => $this->total($productos),
                        'tipo_envio' => $this->tipos_envio[$tienda],
                        'detalle' => $productos,
                        'ciudad_id' => intval($this->ciudad_id),
                        'usuario_id' => auth()->user()->id,
                        'tienda_id' => $productos[0]->options->tienda_id,
                        'created_at' => $fecha,
                        'updated_at' => $fecha,
                    ]);
                    // $pedido = new Pedido();
                    // $pedido->envio = json_encode([
                    //     'contacto' => $this->contacto,
                    //     'telefono' => $this->telefono,
                    //     'direccion' => $this->direccion,
                    //     'referencia' => $this->referencia
                    // ]);
                    // $pedido->costo_envio = $this->costos_envio[$tienda];
                    // $pedido->descuento = 0;
                    // $pedido->total = $this->total($productos);
                    // $pedido->tipo_envio = $this->tipos_envio[$tienda];
                    // $pedido->detalle = $productos;
                    // $pedido->ciudad_id = $this->ciudad_id;
                    // $pedido->usuario_id = auth()->user()->id;
                    // $pedido->tienda_id = $productos[0]->options->tienda_id;
                    // $pedido->save();
                }
                DB::table('pedidos')->insert($pedidos);
                $productos = Producto::whereIn('id', Cart::content()
                    ->pluck('id')->all())
                    ->get();
                foreach (Cart::content() as $item) {
                    $producto = $productos->where('id', $item->id)->first();
                    descontarCantidad($item, $producto);
                }
                Cart::destroy();
                Cache::tags('pedidos-usuario')->flush();
                // session()->flash('status', __('Article saved.'));
                $this->dispatchBrowserEvent('pedido_realizado');
                $this->redirectRoute('pedidos.index');
            }
        } else {
            $tienda = Tienda::where('id', $tienda_id)->first()->nombre;
            $this->dispatchBrowserEvent('agregar_envio', $tienda);
        }
    }

    public function comprobarDisponibilidad()
    {
        $productos = Producto::whereIn('id', Cart::content()->pluck('id')->all())->get();
        $validacion = false;
        foreach (Cart::content() as $item) {
            $producto = $productos->where('id', $item->id)->first();
            $cantidad = cantidad_disponible($item->id, $item->options->color_id, $item->options->talla_id, $producto);
            if ($cantidad < 0) {
                Cart::remove($item->rowId);
                $validacion = true;
            }
        }
        return $validacion;
    }

    public function render()
    {
        $productos = Cart::content()->groupBy('options.tienda_id')->all();
        $tiendas_array = array_keys($productos);
        $tiendas = [];
        foreach ($tiendas_array as $tienda_id) {
            $tiendas[$tienda_id] = Tienda::where('id', $tienda_id)->first();
        }
        return view('livewire.crear-pedido', compact('productos', 'tiendas'))
            ->layoutData(['title' => 'Crear pedido']);
    }
}
