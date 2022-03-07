<?php

namespace App\Http\Livewire\Emprendedor;

use App\Models\Color;
use App\Models\ColorProducto as ModelsColorProducto;
use App\Models\ColorTalla;
use App\Models\Producto;
use App\Models\Talla;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;


class ColorProducto extends Component
{
    public $modal = false;
    public Producto $producto;
    public $colores, $color_id = "", $cantidad = "";
    public $colorProducto = null, $colorProducto_cantidad;
    public $talla;
    protected $listeners = ['delete'];

    protected $rules = [
            'color_id' => 'required|numeric',
            'cantidad' => 'required|numeric|min:0'
    ];

    protected $validationAttributes = [
        'color_id' => "color",
    ];

    public function mount(Producto $producto = null, $talla = null)
    {
        if($producto == null){
            $this->producto = new Producto();
        }
        else{
            $this->producto = $producto;
        }
        $this->colores = Color::all();
        if($talla == null){
            $this->talla = new Talla();
        }
        else{
            $this->talla = $talla;
        }
    }

    public function save()
    {
        $this->validate();
        $colorProducto = $this->talla->id == null ? ModelsColorProducto::where('color_id', $this->color_id)->where('producto_id',$this->producto->id)->first() : ColorTalla::where('color_id', $this->color_id)->where('talla_id',$this->talla->id)->first();
        if ($colorProducto) {
            $colorProducto->cantidad = $colorProducto->cantidad + $this->cantidad;
            $colorProducto->save();
            $this->talla = $this->talla->id == null ? $this->talla : $this->talla->fresh();
        } else {
            if($this->talla->id == null){
                $this->producto->colores()->attach([
                    $this->color_id => [
                        'cantidad' => $this->cantidad
                    ]
                ]);
            }
            else{
                $this->talla->colores()->attach([
                    $this->color_id => [
                        'cantidad' => $this->cantidad
                    ]
                ]);
            }
        }
        $this->reset(['color_id', 'cantidad']);
        $this->emit('saved');
        $this->talla = $this->talla->id == null ? $this->talla : $this->talla->fresh();
        $this->producto = $this->producto->fresh();
    }

    public function edit($id){
        $color_producto = $this->talla->id == null ? ModelsColorProducto::findOrFail($id) : ColorTalla::findOrFail($id);
        $this->colorProducto = $color_producto;
        $this->colorProducto_color_id = $color_producto->color_id;
        $this->colorProducto_cantidad = $color_producto->cantidad;
        $this->modal = true;
    }

    public function update(){
        Validator::make(
            ['colorProducto_cantidad' => $this->colorProducto_cantidad],
            ['colorProducto_cantidad' => ['required','numeric','min:0']],[],
            ['colorProducto_cantidad' => 'cantidad']
        )->validate();
        $this->colorProducto->cantidad = $this->colorProducto_cantidad;
        $this->colorProducto->save();
        $this->producto = $this->producto->fresh();
        $this->talla = $this->talla->id == null ? $this->talla : $this->talla->fresh();
        $this->modal = false;
    }

    public function delete($id){
        $this->colorProducto = null;
        $color_producto = $this->talla->id == null ? ModelsColorProducto::findOrFail($id) : ColorTalla::findOrFail($id);
        $color = $color_producto->color->nombre;
        $color_producto->delete();
        if($this->talla->id != null){
            $this->emit('eliminado',$color);
            return redirect()->route('tienda.productos.editar',$this->producto);
        }
        $this->talla = $this->talla->id == null ? $this->talla : $this->talla->fresh();
        $this->producto = $this->producto->fresh();
        $this->emit('eliminado',$color);
    }

    public function render()
    {
        return view('livewire.emprendedor.color-producto');
    }
}
