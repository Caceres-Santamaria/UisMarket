<?php

namespace App\Http\Livewire;

use App\Models\Color;
use App\Models\Talla;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ActualizarCantidad extends Component
{
    protected $listeners = ['actualizarCantidad'];

    public $rowId, $qty, $cantidad,$color,$talla;

    public function mount()
    {
        $item = Cart::get($this->rowId);
        $this->qty = $item->qty;
        if($item->options->color_id){
            $color = Color::where('id', $item->options->color_id)->first();
            $this->color = $color->id;
        }
        else{
            $this->color = null;
        }
        if($item->options->talla_id){
            $talla = Talla::where('id', $item->options->talla_id)->first();
            $this->talla = $talla->id;
        }
        else{
            $this->talla = null;
        }
        $this->cantidad = cantidad($item->id, $this->color, $this->talla);
    }

    public function actualizarCantidad(){
        $item = Cart::get($this->rowId);
        $this->cantidad = cantidad($item->id, $this->color, $this->talla);
        $this->qty = $item->qty;
    }

    public function decrementar()
    {
        if($this->qty > 1){
            $this->qty -= 1;
            Cart::update($this->rowId, $this->qty);
            $this->emit('render');
            // $this->emitTo('actualizar-cantidad','actualizarCantidad');
        }
    }

    public function incrementar()
    {
        if($this->qty < $this->cantidad){
            $this->qty += 1;
            Cart::update($this->rowId, $this->qty);
            $this->emit('render');
            // $this->emitTo('actualizar-cantidad','actualizarCantidad');
        }
    }

    public function render()
    {
        return view('livewire.actualizar-cantidad');
    }
}
