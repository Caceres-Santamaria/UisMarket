<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CarritoCompras extends Component
{
    protected $listeners = ['render'];

    public function destroy(){
        Cart::destroy();
        $this->emitTo('carrito', 'render');
        $this->emitTo('carrito-desplegable', 'render');
    }

    public function delete($rowID){
        Cart::remove($rowID);
        $this->emitTo('carrito', 'render');
        $this->emitTo('carrito-desplegable', 'render');
    }

    public function render()
    {
        // Cart::destroy();
        return view('livewire.carrito-compras')
                ->layoutData(['title'=>'Carrito de compras']);
    }

    public function clearFlash()
    {
        session()->forget('message');
    }
}
