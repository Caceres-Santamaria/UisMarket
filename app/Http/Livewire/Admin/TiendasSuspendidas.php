<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tienda;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class TiendasSuspendidas extends DataTableComponent
{
  protected $listeners = ['aprobar'];
  public string $defaultSortColumn = 'revision';
  public string $defaultSortDirection = 'desc';
  public function columns(): array
  {
      return [
          Column::make('Imagen', 'imagen')
              ->format(function ($value, $column, $row) {
                return view('admin.logo_tienda')->withTienda($row);
              }),
          Column::make('Nombre', 'nombre')
              ->sortable()
              ->searchable(),
          Column::make('Modificado', 'updated_at')
              ->sortable()
              ->format(function ($value, $column, $row) {
                  return $value->diffForHumans();
              }),
          Column::make('Revisión', 'revision')
              ->sortable()
              ->format(function ($value, $column, $row) {
                  if($value){
                      return 'Sí';
                  }
                  else{
                      return 'No';
                  }
              }),
          Column::make('Acciones')
              ->format(function ($value, $column, $row) {
                  return view('admin.acciones_tienda')->withTienda($row);
              }),
      ];
  }

  public function query(): Builder
  {
      return Tienda::query()->where('estado', '2');
  }

  public function aprobar($id): void
  {
      $tienda = Tienda::where('id', $id)->first();
      $tienda->estado = '1';
      $tienda->revision = '0';
      $tienda->save();
  }
}
