<?php

namespace App\Http\Livewire;

use App\Models\Ciudad;
use App\Models\Tienda;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearTienda extends Component
{
  use WithFileUploads;
  public $logo;
  public $portada;
  public Tienda $tienda;
  public $costos = [];
  public $ciudades = [];

  protected function rules()
  {
    return [
      'logo' => [
        'image', 'max:2048'
      ],
      'portada' => [
        'image', 'max:2048'
      ],
      'tienda.nombre' => 'required | max:50| min:3',
      'tienda.descripcion' => 'required',
      'tienda.direccion' => 'max:100',
      'tienda.telefono' => 'required|digits:10',
      'tienda.email' => 'required | email | max:191',
      'tienda.facebook' => 'max:191',
      'tienda.whatsapp' => 'max:191',
      'tienda.instagram' => 'max:191',
      'tienda.slug' => [
        'required', 'alpha_dash',
        Rule::unique('tiendas', 'slug')->ignore($this->tienda)
      ],
      'tienda.recoger_tienda' => ['required', 'in:0,1'],
      'tienda.ciudad_id' => 'required',
      'tienda.user_id' => 'required',
    ];
  }

  public function mount(Tienda $tienda)
  {
    $this->tienda = $tienda;
    foreach (Ciudad::all() as $ciudad) {
      $this->costos[$ciudad->id] = 0;
      $this->ciudades[$ciudad->id] = $ciudad->nombre;
    }
  }

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }

  public function uploadLogo()
  {
    if ($oldLogo = $this->tienda->logo) {
      Storage::disk('public')->delete($oldLogo);
    }
    return $this->logo->store('/images/logos', 'public');
  }

  public function uploadPortada()
  {
    if ($oldPortada = $this->tienda->portada) {
      Storage::disk('public')->delete($oldPortada);
    }
    return $this->portada->store('/images/portadas', 'public');
  }

  public function modificarCosto($ciudad, $costo)
  {
    if (array_key_exists($ciudad, $this->costos)) {
      // Validator::make($costo, ['required', 'numeric', 'min:0'], $message = [
      //   'required' => 'el costo es requerido',
      //   'numeric' => 'el costo es un número',
      //   'min' => 'el costo no debe ser menor a cero',
      // ]);
      $this->costos[$ciudad] = (int)$costo;
    }
  }

  public function save()
  {
    $this->tienda->slug = Str::slug($this->tienda->nombre);
    $this->validate();
    if ($this->logo) {
      $this->tienda->logo = $this->uploadLogo();
    }
    if ($this->portada) {
      $this->tienda->portada = $this->uploadPortada();
    }
    $this->tienda->save();
  }

  public function render()
  {
    return view('livewire.crear-tienda')
      ->layoutData(['title' => 'Crear Tienda']);
  }
}
