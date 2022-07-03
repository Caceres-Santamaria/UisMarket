<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tienda;
use Livewire\Component;

class SolicitudesContenedor extends Component
{
  public $modal = false;
  public $modalComentario = false;
  public Tienda $tienda;
  protected $listeners = ['verCarnet', 'crearComentario', 'rechazar'];

  protected function rules()
  {
    return [
      'tienda.comentario' => 'required | max:2000',
    ];
  }

  public function mount()
  {
    $this->tienda = new Tienda();
    // $this->tienda = $tienda;
  }
  public function verCarnet(Tienda $tienda)
  {
    // dd($tienda);
    $this->tienda = $tienda;
    $this->modal = true;
  }

  public function crearComentario(Tienda $tienda)
  {
    $this->tienda = $tienda;
    $this->modalComentario = true;
  }

  public function rechazar(Tienda $tienda): void
  {
    $tienda->comentario = $this->tienda->comentario;
    $this->validate();
    $tienda->estado = '3';
    $this->modalComentario = false;
    $tienda->save();
    $this->emitTo('admin.solicitudes', 'render');
  }
  public function render()
  {
    return view('livewire.admin.solicitudes-contenedor')
      ->layout('layouts.admin', ['title' => 'solicitudes']);
  }
}
