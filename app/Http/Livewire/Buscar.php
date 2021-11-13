<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;

class Buscar extends Component
{
    public $busqueda;

    public function render()
    {
        if($this->busqueda == ""){
            $productos = [];
        }
        else{
            $productos = Producto::where('nombre','LIKE',"%".$this->search."%")->get();
        }
        return view('livewire.buscar',compact('productos'));
    }
}
