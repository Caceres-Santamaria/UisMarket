<?php

namespace App\Http\Livewire\Emprendedor;

use App\Models\Producto;
use App\Models\Talla;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class TallaProducto extends Component
{
    public $open = false;
    public Producto $producto;
    public $talla = "";
    public Talla $modelTalla;
    public $editTalla;
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

    public function mount(Producto $producto = null)
    {
        if($producto == null){
            $this->producto = new Producto();
        }
        else{
            $this->producto = $producto;
        }
        $this->modelTalla = new Talla();
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

    public function edit(Talla $talla){
        $this->open = true;
        $this->modelTalla = $talla;
        $this->editTalla = $talla->nombre;
    }

    public function update(){

        Validator::make(
            ['editTalla' => $this->editTalla],
            ['editTalla' => ['required','string','max:90']],[],
            ['editTalla' => 'talla']
        )->validate();
        $this->modelTalla->nombre = $this->editTalla;
        $this->modelTalla->save();
        $this->producto = $this->producto->fresh();
        $this->modelTalla = new Talla();
        $this->open = false;
    }

    public function delete(Talla $talla){
        // $talla->delete();
        $this->modelTalla = new Talla();
        $talla->forceDelete();
        $this->producto = $this->producto->fresh();
        // dd($this->producto);
    }

    public function render()
    {
        return view('livewire.emprendedor.talla-producto');
    }
}
