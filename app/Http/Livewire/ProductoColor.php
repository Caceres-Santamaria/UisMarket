<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ProductoColor extends Component
{
    public $producto, $colores;
    public $color_id = "";
    public $qty = 1;
    public $quantity = 0;

    public $options = [
        'talla_id' => null,
    ];

    public function mount()
    {
        $this->colores = $this->producto->colores;
        $this->options['image'] = Storage::url($this->producto->imagenes->first()->url);
        $this->options['slug'] = $this->producto->slug;
        $this->options['tienda_id'] = $this->producto->tienda->id;
        $this->options['tienda_slug'] = $this->producto->tienda->slug;
        $this->options['tienda_nombre'] = $this->producto->tienda->nombre;
    }

    public function updatedColorId($value)
    {
        $color = $this->producto->colores->find($value);
        $this->quantity = cantidad_disponible($this->producto->id, $color->id);
        $this->reset('qty');
        $this->options['color'] = $color->nombre;
        $this->options['color_id'] = $color->id;
    }

    public function decrement()
    {
        $this->qty = $this->qty > 1 ? $this->qty - 1 : 1;
    }

    public function increment()
    {
        $this->qty = $this->qty < $this->quantity ? $this->qty + 1 : $this->qty;
    }

    public function addItem()
    {
        $disponible = cantidad_disponible($this->producto->id, $this->color_id);
        if ($this->qty <= $disponible) {
            Cart::add([
                'id' => $this->producto->id,
                'name' => $this->producto->nombre,
                'qty' => $this->qty,
                'price' => $this->producto->precio - round($this->producto->precio*$this->producto->descuento),
                'weight' => 550,
                'options' => $this->options
            ])->associate('Producto');
            $this->reset('quantity');
            $this->reset('color_id');
            $this->reset('qty');
            $this->emitTo('carrito', 'render');
            $this->emitTo('carrito-desplegable', 'render');
            $this->dispatchBrowserEvent('successAlert');
        } else {
            $this->quantity = $disponible;
            $this->reset('qty');
            $this->dispatchBrowserEvent('errorAlert');
        }
    }

    public function render()
    {
        return view('livewire.producto-color');
    }
}
