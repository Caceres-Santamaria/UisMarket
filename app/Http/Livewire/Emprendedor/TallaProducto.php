<?php

namespace App\Http\Livewire\Emprendedor;

use App\Models\Producto;
use App\Models\Talla;
use Livewire\Component;
use Illuminate\Validation\Rule;

class TallaProducto extends Component
{
    public $modal = false;
    public Producto $producto;
    public $talla;
    protected $listeners = ['delete'];

    protected function rules(){
        return [
            'talla' => [
                'required',
                'string',
                'max:90',
                // Rule::unique('tallas', 'nombre')->ignore($this->producto->id)
            ],
        ];
    }

    public function mount(Producto $producto)
    {
        $this->producto = $producto;
    }

    public function save()
    {
        $this->validate();
        $talla = Talla::where('producto_id', $this->producto->id)->where('nombre', $this->talla)->first();
        if ($talla) {
            $this->addError('talla', 'Esa talla ya existe, intenta agregar otra');
            $this->reset('talla');
        } else {
            $this->producto->tallas()->create([
                'nombre' => $this->talla
            ]);
            $this->reset('talla');
            $this->producto = $this->producto->fresh();
        }
    }

    public function render()
    {
        return view('livewire.emprendedor.talla-producto');
    }
}
