<?php

namespace App\Http\Livewire\Emprendedor;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Producto;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ProdEliminados extends DataTableComponent
{
  public function columns(): array
  {
      return [
          Column::make('Imagen', 'imagen')
              ->format(function ($value, $column, $row) {
                  return view('admin.imagen_producto')->withProducto($row);
              }),
          Column::make('Nombre', 'nombre')
              ->sortable()
              ->searchable(),
          Column::make('Categoría', 'categoria.nombre')
              ->searchable(),
          Column::make('Acciones', 'deleted_at')
              ->sortable()
              ->format(function ($value, $column, $row) {
                  return view('emprendedor.acciones_producto_eliminado')->withProducto($row);
              }),
      ];
  }
  public function query(): Builder
  {
      return Producto::query()->where('tienda_id',auth()->user()->tienda->id)->onlyTrashed();
  }
  public function activar($id)
    {
        $producto = Producto::findOrFail($id)->restore();
        $this->dispatchBrowserEvent('successProductoAlert', 'habilitar');
    }

  public function eliminarDef($id)
  {
      $producto = Producto::findOrFail($id);
      $producto->forceDelete();
      $this->dispatchBrowserEvent('successProductoAlert', 'eliminar');
  }
}
