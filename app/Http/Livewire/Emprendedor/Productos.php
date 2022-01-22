<?php

namespace App\Http\Livewire\Emprendedor;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Producto;
use App\Models\ImagenProducto;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Productos extends DataTableComponent
{
    protected $listeners = ['eliminar', 'activar'];

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
            Column::make('Precio', 'precio')
                ->sortable()
                ->searchable()
                ->format(function ($value, $column, $row) {
                    return view('emprendedor.precio')->withProducto($row);
                }),
            Column::make('Descuento', 'descuento')
                ->sortable()
                ->searchable()
                ->format(function ($value, $column, $row) {
                    return view('emprendedor.descuento')->withProducto($row);
                }),
                Column::make('Estado', 'estado')
                ->sortable()
                ->format(function ($value, $column, $row) {
                    return view('emprendedor.estado_pub_producto')->withProducto($row);
                }),
            Column::make('Acciones', 'deleted_at')
                ->sortable()
                ->format(function ($value, $column, $row) {
                    return view('emprendedor.acciones_producto')->withProducto($row);
                }),
        ];
    }

    public function query(): Builder
    {
        return Producto::query()->where('tienda_id',auth()->user()->tienda->id)->withTrashed();
    }

    public function eliminar($id)
    {
        $producto = Producto::where('id', $id)->first();
        $producto->delete();
        $this->dispatchBrowserEvent('successProductoAlert', 'inhabilitar');
    }

    public function activar($id)
    {
        $producto = Producto::where('id', $id)->restore();
        $this->dispatchBrowserEvent('successProductoAlert', 'habilitar');
    }
}
