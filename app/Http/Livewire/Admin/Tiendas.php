<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Tienda;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Tiendas extends DataTableComponent
{

  protected $listeners = ['eliminar', 'activar'];

  public function columns(): array
  {
    return [
      Column::make('Logo', 'logo')
        ->format(function ($value, $column, $row) {
          return view('admin.logo_tienda')->withTienda($row);
        }),
      Column::make('Nombre', 'nombre')
        ->sortable()
        ->searchable(),
        Column::make('Email', 'email')
        ->sortable()
        ->searchable(),
      Column::make('Ciudad', 'ciudad.nombre')
        ->searchable(),

      Column::make('Acciones','deleted_at')
        ->sortable()
        ->format(function ($value, $column, $row) {
          return view('admin.acciones_tienda')->withTienda($row);
        }),
    ];
  }

  public function query(): Builder
  {
    return Tienda::query()->withTrashed();
  }

  public function eliminar($id){
    $tienda = Tienda::where('id',$id)->first();
    $tienda->delete();
    $this->dispatchBrowserEvent('successTiendaAlert', 'inhabilitar');
  }

  public function activar($id){
    $tienda = Tienda::where('id',$id)->restore();
    $this->dispatchBrowserEvent('successTiendaAlert', 'habilitar');
  }
}
