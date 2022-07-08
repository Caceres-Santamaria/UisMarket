<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Producto;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Productos extends DataTableComponent
{
    protected $listeners = ['suspender'];
    public string $defaultSortColumn = 'created_at';
    public string $defaultSortDirection = 'desc';

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
            Column::make('Creación', 'created_at')
                ->sortable()
                ->format(function ($value, $column, $row) {
                    return $value->diffForHumans();
                }),
            // Column::make('Categoría', 'categoria.nombre')
            //     ->sortable(function(Builder $query, $direction){
            //         return $query->orderBy(Categoria::select('nombre')->whereColumn('categorias.id', 'categoria_id'),$direction);
            //     })
            //     ->searchable(),
            Column::make('Tienda', 'tienda.nombre')
                ->searchable(),
            Column::make('Acciones')
                ->format(function ($value, $column, $row) {
                    return view('admin.acciones_producto')->withProducto($row);
                }),
        ];
    }

    public function query(): Builder
    {
        return Producto::query()->where('publicacion','2')->whereRelation('tienda', 'deleted_at', null)->whereRelation('tienda', 'estado', '1');
    }

    public function suspender($id)
    {
        $producto = Producto::where('id', $id)->first();
        $producto->publicacion = '3';
        $producto->save();
        $producto->unsearchable();
    }
}
