<?php

namespace App\Http\Livewire\Admin;

use App\Models\Calificacion;
use App\Models\Tienda;
use Livewire\Component;
use Livewire\WithPagination;

class Tiendas extends Component
{
    use WithPagination;
    protected $listeners = ['abrir'];
    public $modal = false;
    public $tienda = null;

    public function mount(Tienda $tienda){
      $this->tienda = $tienda;
    }

    public function cancelar(){
      $this->modal = false;
  }

  public function abrir($id){
    $this->tienda = Tienda::findOrFail($id);
    // $this->tienda->calificaciones()->where('contenido','<>', null)->paginate(15);
    // dd($this->calificaciones->all());
    $this->modal = true;
    // dd($this->tienda->calificaciones);
  }

  public function eliminar($calificacion){
    $this->tienda->calificaciones->where('id',$calificacion)->first()->update(['contenido' => null]);
  }

    public function render()
    {
        return view('livewire.admin.tiendas')
        ->layout('layouts.admin')
        ->layoutData(['title' => 'Tiendas']);
    }
}
