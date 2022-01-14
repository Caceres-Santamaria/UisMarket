<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearAdministrador extends Component
{
  use WithFileUploads;
  public User $user;
  public $password_confirmation;

  protected function rules()
  {
    return [
      'user.name' => 'required | max:191| min:2',
      'user.slug' => [
        'required', 'alpha_dash',
        Rule::unique('users', 'slug')->ignore($this->user)
      ],
      'user.email' => 'required | email| max:191',
      'user.password' => 'required | password',
      'user.rol' => 'required',
      'password_confirmation'=> 'required| same:user.password',

    ];
  }

  public function mount(User $user)
  {
    $this->user = $user;
  }

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }

  public function save()
  {
    $this->user->slug=Str::slug($this->user->nombre);
    $this->user->rol=1;
    $this->validate();
    $this->user->save();
  }

  public function render()
  {
    return view('livewire.admin.crear-administrador')
      ->layout('layouts.admin', ['title' => 'Administradores']);
  }
}
