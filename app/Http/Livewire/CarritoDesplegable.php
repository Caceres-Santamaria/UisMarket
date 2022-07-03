<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CarritoDesplegable extends Component
{
    protected $listeners = ['render'];

    public function render()
    {
        return view('livewire.carrito-desplegable');
    }
}
