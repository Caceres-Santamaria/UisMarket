<?php

namespace App\Http\Livewire;

use App\Models\Talla;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ProductoTalla extends Component
{
    public $producto, $tallas;
    public $color_id = "";
    public $qty = 1;
    public $quantity = 0;
    public $talla_id = "";

    public $colores = [];

    public $options = [];

    public function mount()
    {
        $this->tallas = $this->producto->tallas;
        $this->options['image'] = Storage::url($this->producto->imagenes->first()->url);
        $this->options['slug'] = $this->producto->slug;
    }

    public function updatedTallaId($value)
    {
        $talla = Talla::find($value);
        $this->colores = $talla->colores;
        $this->quantity = 0;
        $this->reset('qty');
        $this->reset('color_id');
        $this->options['talla'] = $talla->nombre;
        $this->options['talla_id'] = $talla->id;
    }

    public function updatedColorId($value)
    {
        $talla = Talla::find($this->talla_id);
        $color = $talla->colores->find($value);
        $this->quantity = cantidad_disponible($this->producto->id, $color->id, $talla->id);
        $this->reset('qty');
        $this->options['color'] = $color->nombre;
        $this->options['color_id'] = $color->id;
    }

    public function decrement()
    {
        $this->qty = $this->qty > 1 ? $this->qty -1 : 1;
    }

    public function increment()
    {
        $this->qty = $this->qty < $this->quantity ? $this->qty + 1 : $this->qty;
    }

    public function addItem()
    {
        $disponible = cantidad_disponible($this->producto->id, $this->color_id, $this->talla_id);
        if($this->qty <= $disponible){
            Cart::add([
                'id' => $this->producto->id,
                'name' => $this->producto->nombre,
                'qty' => $this->qty,
                'price' => $this->producto->precio - round($this->producto->precio*$this->producto->descuento),
                'weight' => 550,
                'options' => $this->options
            ]);
            $this->quantity = $disponible;
            $this->reset('qty');
            $this->colores = [];
            $this->emitTo('carrito', 'render');
            $this->emitTo('carrito-desplegable', 'render');
            $this->dispatchBrowserEvent('successAlert');
        }
        else{
            $this->quantity = $disponible;
            $this->reset('qty');
            $this->dispatchBrowserEvent('errorAlert');
        }
    }

    public function render()
    {
        return view('livewire.producto-talla');
    }
}
