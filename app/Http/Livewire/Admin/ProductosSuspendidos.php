<?php

namespace App\Http\Livewire\Admin;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ProductosSuspendidos extends DataTableComponent
{
    protected $listeners = ['aprobar'];
    public string $defaultSortColumn = 'revision';
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
            Column::make('Modificado', 'updated_at')
                ->sortable()
                ->format(function ($value, $column, $row) {
                    return $value->diffForHumans();
                }),
            Column::make('Tienda', 'tienda.nombre')
                ->searchable(),
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
                    return view('admin.acciones_producto')->withProducto($row);
                }),
        ];
    }

    public function query(): Builder
    {
        return Producto::query()->where('publicacion', '3');
    }

    public function aprobar($id): void
    {
        $producto = Producto::where('id', $id)->first();
        $producto->publicacion = '2';
        $producto->revision = '0';
        $producto->save();
    }
}
