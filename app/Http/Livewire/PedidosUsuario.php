<?php

namespace App\Http\Livewire;

use App\Models\Pedido;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class PedidosUsuario extends Component
{
    public $estado = '';
    public User $user;
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
        $estado = $this->estado == '' ? '1':$this->estado;
        $key = 'pedidos-'.$estado.'-'.$this->user->id;
        // dd($key);
        $pedidos = Cache::tags('pedidos-usuario')->rememberForever($key, function() use ($estado) {
            return Pedido::where('usuario_id',$this->user->id)->where('estado',$estado)->orderBy('created_at', 'desc')->get();
        });
        return view('livewire.pedidos-usuario',compact('pedidos'));
    }
}
