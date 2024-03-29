<?php

namespace App\Http\Livewire\Emprendedor;

use App\Models\Producto;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class EstadoProducto extends Component
{
    public $producto, $publicacion;
    protected $listeners = ['mount'];

    public function mount(): void
    {
        $this->publicacion = $this->producto->publicacion;
    }

    public function save(): void
    {
        Validator::make(
            ['publicacion' => $this->publicacion],
            ['publicacion' => 'required|in:1,2']
        )->validate();
        if($this->producto->prioridad == 0 and $this->publicacion == 2){
            $this->publicacion = 1;
            $this->emit('Nosaved');
        }
        else{
            $this->producto->publicacion = $this->publicacion;
            $this->producto->save();
            $this->emit('saved');
        }
    }

    public function revision(): void
    {
        $this->producto->revision  = true;
        $this->producto->save();
        $this->emit('revisado');
    }

    public function render()
    {
        return view('livewire.emprendedor.estado-producto');
    }
}
