<?php

namespace App\Http\Livewire;

use App\Models\Producto;
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

    public function validar()
    {
        // route('pedidos.create')
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
        if($validacion) {
            $this->emitTo('carrito', 'render');
            $this->emitTo('carrito-desplegable', 'render');
            $this->dispatchBrowserEvent('stock_insuficiente');
        } else {
            return redirect()->route('pedidos.create');
        }
    }

    public function clearFlash()
    {
        session()->forget('message');
    }
}
