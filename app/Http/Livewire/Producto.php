<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Producto extends Component
{
    public $producto, $quantity;
    public $qty = 1;
    public $options = [
        'color_id' => null,
        'talla_id' => null
    ];

    public function mount()
    {
        $this->quantity = cantidad_disponible($this->producto->id);
        $this->options['image'] = Storage::url($this->producto->imagenes->first()->url);
    }

    public function decrement()
    {
        $this->qty = $this->qty - 1;
    }

    public function increment()
    {
        $this->qty = $this->qty + 1;
    }

    public function addItem()
    {
        Cart::add([
            'id' => $this->producto->id,
            'name' => $this->producto->nombre,
            'qty' => $this->qty,
            'price' => $this->producto->precio,
            'weight' => 550,
            'options' => $this->options
        ]);

        $this->quantity = cantidad_disponible($this->producto->id);

        $this->reset('qty');

        $this->emitTo('dropdown-cart', 'render');
    }

    public function render()
    {
        return view('livewire.producto');
    }
}
