<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tienda;
use Livewire\Component;

class SolicitudesContenedor extends Component
{
  public $modal = false;
  public Tienda $tienda;
  protected $listeners = ['verCarnet'];

  public function mount(){
    $this->tienda = new Tienda();
  }
  public function verCarnet(Tienda $tienda){
    // dd($tienda);
    $this->tienda = $tienda;
    $this->modal = true;
  }

  public function render()
  {
    return view('livewire.admin.solicitudes-contenedor')
    ->layout('layouts.admin', ['title' => 'solicitudes']);
  }

}
