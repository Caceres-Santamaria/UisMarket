<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditarProducto extends Component
{
  public $categorias;
  public $id_categoria = "";
  public $nombre, $slug, $descripcion, $precio, $cantidad, $publicacion, $estado;


  protected $rules = [
    'id_categoria' => 'required',
    'nombre' => 'required',
    'slug' => 'required|unique:products',
    'descripcion' => 'required',
    'precio' => 'required|numeric|min:0',
    'publicacion' => 'required',
    'estado' => 'required',
    'cantidad'=> 'required|numeric|min:0',
  ];

  protected $messages = [
    'precio.min' => "El precio debe ser mayor a cero",
    'cantidad.min' => "La cantidad debe ser mayor a cero"
  ];
  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }
  public function render()
  {
    return view('livewire.editar-producto')
      ->layoutData(['title' => 'Editar Producto']);
  }
}
