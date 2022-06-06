<?php

namespace App\Http\Livewire;

use App\Models\Calificacion;
use App\Models\Pedido;
use Livewire\Component;

class CalificacionPedido extends Component
{
    protected $listeners = ['render'];
    public $modal = false;
    public Pedido $pedido;
    public Calificacion $calificacion;
    public $contenido;

    protected function rules()
    {
        return [
            'calificacion.calificacion' => 'required | numeric | min:1 | max:5',
            'calificacion.contenido' => 'max:255',
            'calificacion.pedido_id' => 'required',
        ];
    }

    public function mount(Pedido $pedido) {
        $this->calificacion = $pedido->calificacion ? $pedido->calificacion : new Calificacion();
        if(!$this->calificacion->id) {
            $this->calificacion->pedido_id = $pedido->id;
            $this->contenido = '';
        } else {
            $this->contenido = $this->calificacion->contenido;
        }
        $this->pedido = $pedido;
    }

    // public function updated($item){
    //     $this->validateOnly($item);
    // }

    public function guardar(){
        $this->calificacion->contenido = trim($this->calificacion->contenido) == "" ? null : trim($this->calificacion->contenido);
        // $this->calificacion->pedido_id = $this->pedido_id;
        $this->validate();
        $this->modal = false;
        $this->calificacion->save();
        $this->contenido = $this->calificacion->contenido;
    }

    public function render()
    {
        return view('livewire.calificacion-pedido');
    }

    public function cancelar(){
        $this->modal = false;
        if($this->calificacion->id){
            $this->calificacion = $this->pedido->calificacion;
        }
        else{
            $this->calificacion->contenido = null;
            $this->calificacion->calificacion = null;
        }
    }
}
