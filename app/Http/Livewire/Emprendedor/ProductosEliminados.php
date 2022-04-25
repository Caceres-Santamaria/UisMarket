<?php

namespace App\Http\Livewire\Emprendedor;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ProductosEliminados extends DataTableComponent
{
    protected $listeners = ['restore', 'delete','refreshDatatable' => '$refresh'];

    public function columns(): array
    {
        return [
            Column::make('Imagen', 'imagen')
                ->format(function ($value, $column, $row) {
                    return view('admin.imagen-producto')->withProducto($row);
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
        return Producto::query()->where('tienda_id', auth()->user()->tienda->id)->onlyTrashed();
    }
    public function restore($id)
    {
        Producto::withTrashed()->findOrFail($id)->restore();
        $this->emit('refreshDatatable');
    }

    public function delete($id)
    {
        $producto = Producto::withTrashed()->findOrFail($id);
        $imagenes = $producto->imagenes;

        foreach ($imagenes as $imagen) {
            Storage::disk('public')->delete($imagen->url);
            $imagen->delete();
        }

        $producto->forceDelete();
        $this->emit('refreshDatatable');
    }
}
