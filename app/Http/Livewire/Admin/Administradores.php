<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Database\Eloquent\Builder;
use App\Models\User;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Administradores extends DataTableComponent
{

    protected $listeners = ['eliminar', 'activar', 'render'];

    public function columns(): array
    {
        return [
            Column::make('Nombre', 'name')
                ->sortable()
                ->searchable(),
            Column::make('Correo electronico', 'email')
                ->sortable()
                ->searchable(),

            Column::make('Acciones', 'deleted_at')
                ->sortable()
                ->format(function ($value, $column, $row) {
                    return view('admin.acciones')->withUser($row);
                }),
        ];
    }

    public function query(): Builder
    {
        return User::query()->withTrashed()->where('rol', '1');
    }

    public function eliminar($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        $this->dispatchBrowserEvent('successUserAlert', 'inhabilitar');
    }

    public function activar($id)
    {
        $user = User::where('id', $id)->restore();
        $this->dispatchBrowserEvent('successUserAlert', 'habilitar');
    }
}
