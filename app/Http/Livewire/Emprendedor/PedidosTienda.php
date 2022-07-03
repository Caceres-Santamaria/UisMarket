<?php

namespace App\Http\Livewire\Emprendedor;

use App\Models\Pedido;
use App\Models\User;
use Livewire\Component;

class PedidosTienda extends Component
{

    public $estado = '';
    public User $usuario;
    protected $queryString = [
        'estado' => ['except' => ''],
    ];

    protected $listeners = ['setiar'];

    public function setiar($id)
    {
        $this->estado = $id;
    }

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        if ($this->estado == '') {
            $pedidos = Pedido::where('tienda_id', $this->user->tienda->id)->where('estado', 1)->orderBy('created_at', 'asc')->get();
        } else {
            $pedidos = Pedido::where('tienda_id', $this->user->tienda->id)->where('estado', $this->estado)->orderBy('created_at', 'asc')->get();
        }
        return view('livewire.emprendedor.pedidos-tienda', compact('pedidos'));
    }
}
