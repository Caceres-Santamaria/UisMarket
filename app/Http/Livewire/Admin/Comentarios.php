<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Calificacion;
use App\Models\Tienda;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Comentarios extends DataTableComponent
{
  public Tienda $tienda;
  public $calificaciones;

  public function mount(Tienda $tienda){
    $this->tienda = $tienda;
    $this->calificaciones = $tienda->calificaciones->toQuery()->pluck('id')->all();
  }

  public function columns(): array
  {
    return [
      Column::make('Contenido', 'contenido')
        ->searchable()
        ->format(function ($value, $column, $row) {
          return view('admin.contenido_comentario')->withCalificacion($row);
        }),
        Column::make('Usuario', 'pedido.usuario.name')
        ->searchable(),
        Column::make('Email', 'pedido.usuario.email')
        ->searchable(),
      Column::make('Acciones', 'deleted_at')
        ->format(function ($value, $column, $row) {
          return view('admin.acciones_comentario')->withCalificacion($row);
        }),
    ];
  }

  public function query(): Builder
  {
    return Calificacion::query()->whereIn('id',$this->calificaciones)->where('contenido' ,'<>', null);
  }

  public function eliminar($calificacion){
    $this->tienda->calificaciones->where('id',$calificacion)->first()->update(['contenido' => null]);
  }
}
