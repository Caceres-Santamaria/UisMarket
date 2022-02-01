<?php

namespace App\Http\Livewire;

use App\Models\Calificacion;
use Livewire\Component;

class CalificacionPedido extends Component
{
    protected $listeners = ['render'];
    public $modal = false;
    public $pedido_id;
    public Calificacion $calificacion;

    protected function rules()
    {
        return [
            'calificacion.calificacion' => 'required | numeric | min:1 | max:5',
            'calificacion.contenido' => 'max:255',
            'calificacion.pedido_id' => 'required',
        ];
    }

    public function mount(Calificacion $calificacion, $id){
        $this->calificacion = $calificacion;
        $this->calificacion->pedido_id = $id;
        $this->pedido_id = $id;
    }

    public function updated($item){
        $this->validateOnly($item);
    }

    public function guardar(){
      // dd($this->calificacion->contenido);
        $this->calificacion->contenido = $this->calificacion->contenido == "" ? null : $this->calificacion->contenido;
        $this->calificacion->pedido_id = $this->pedido_id;
        // dd($this->calificacion->contenido);
        $this->validate();
        $this->modal = false;
        $this->calificacion->save();
    }

    public function render()
    {
        return view('livewire.calificacion-pedido');
    }

    public function cancelar(){
        $this->modal = false;
        if($this->calificacion->id){
            $this->calificacion = Calificacion::where('pedido_id',$this->pedido_id)->first();
            // return redirect()->route('pedidos.show',$this->pedido_id);
        }
        else{
            $this->calificacion = new Calificacion();
        }
    }
}
