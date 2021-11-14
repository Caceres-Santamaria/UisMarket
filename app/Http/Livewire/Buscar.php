<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;

class Buscar extends Component
{
    public $busqueda = 'g';

    public function render()
    {
        if($this->busqueda == ""){
            $productos = [];
            $cantidad = 0;
        }
        else{
            $productos = Producto::where('nombre','LIKE',"%".$this->busqueda."%")
                                    ->where('publicacion',2);
            $cantidad = $productos->count();
            $productos = $productos->take(6)
                                    ->get();
        }
        return view('livewire.buscar',compact('productos','cantidad'));
    }
}
