<?php

namespace App\Http\Livewire;

use App\Models\Pedido;
use App\Models\User;
use Livewire\Component;

class PedidosUsuario extends Component
{
    public $estado = '';
    public User $usuario;
    protected $queryString = [
        'estado' => ['except' => ''],
    ];

    protected $listeners = ['setiar'];

    public function setiar($id){
        $this->estado = $id;
    }

    public function mount(){
        $this->user = auth()->user();

    }

    public function render()
    {
        if($this->estado == ''){
            $pedidos = Pedido::where('usuario_id',$this->user->id)->where('estado',1)->orderBy('created_at', 'desc')->get();
        }
        else{
            $pedidos = Pedido::where('usuario_id',$this->user->id)->where('estado',$this->estado)->orderBy('created_at', 'desc')->get();
        }
        return view('livewire.pedidos-usuario',compact('pedidos'));
    }
}
