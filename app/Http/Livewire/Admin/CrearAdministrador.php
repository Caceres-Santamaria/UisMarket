<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Livewire\Component;
use Laravel\Fortify\Rules\Password;

class CrearAdministrador extends Component
{
    public User $users;
    public $password_confirmation;
    public $password;

    protected $listeners = ['save'];

    protected function rules()
    {
        return [
            'users.name' => ['required', 'string', 'max:191', 'min:3'],
            'users.email' => [
                'required',
                'string',
                'email',
                'max:191',
                Rule::unique(User::class),
            ],
            'password' => ['required', 'min:8', 'max:50', new Password],
            'users.rol' => 'required',
            'password_confirmation' => ['required', 'min:8', 'max:50', new Password, 'same:password'],
        ];
    }

    public function mount(User $users)
    {
        $this->users = $users;
    }

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

    public function save()
    {
        $this->users->rol = '1';
        $this->users->password = bcrypt($this->password);
        $this->validate();
        $this->users->save();
        $this->dispatchBrowserEvent('saved','Se ha creado una nueva cuenta administradora exitosamente');
        $this->users = new User();
        $this->password_confirmation = '';
        $this->password = '';
        $this->emitTo('admin.administradores','render');
    }

    public function render()
    {
        return view('livewire.admin.crear-administrador')
            ->layout('layouts.admin', ['title' => 'Administradores']);
    }
}
