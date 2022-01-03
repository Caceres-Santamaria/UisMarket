<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Producto extends Component
{
    public $producto, $quantity = 0;
    public $qty = 1;
    public $options = [
        'color_id' => null,
        'talla_id' => null
    ];

    public function mount()
    {
        $this->quantity = cantidad_disponible($this->producto->id);
        $this->options['image'] = Storage::url($this->producto->imagenes->first()->url);
        $this->options['slug'] = $this->producto->slug;
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
        $disponible = cantidad_disponible($this->producto->id);
        $this->quantity = $disponible;
        if ($this->qty <= $disponible) {
            Cart::add([
                'id' => $this->producto->id,
                'name' => $this->producto->nombre,
                'qty' => $this->qty,
                'price' => $this->producto->precio - round($this->producto->precio*$this->producto->descuento),
                'weight' => 550,
                'options' => $this->options
            ]);
            $this->reset('qty');
            $this->emitTo('carrito', 'render');
            $this->emitTo('carrito-desplegable', 'render');
            $this->dispatchBrowserEvent('successAlert');
        } else {
            $this->reset('qty');
            $this->dispatchBrowserEvent('errorAlert');
        }
    }

    public function render()
    {
        return view('livewire.producto');
    }
}
