<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Users extends DataTableComponent
{
  protected $listeners = ['eliminar', 'activar'];

  public function columns(): array
  {
    return [
      Column::make('Nombre', 'name')
        ->sortable()
        ->searchable(),
      Column::make('Email', 'email')
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
    return User::query()->withTrashed()->whereIn('rol', [2, 3]);
  }

  public function eliminar($id)
  {
    $user = User::where('id', $id)->first();
    if ($user->tienda) {
      $user->tienda->delete();
    }
    $user->delete();
    $this->dispatchBrowserEvent('successUserAlert', 'inhabilitar');
  }

  public function activar($id)
  {
    $user = User::where('id', $id)->restore();
    $this->dispatchBrowserEvent('successUserAlert', 'habilitar');
  }
}
