<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Categoria;
use App\Models\Producto;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Categorias extends DataTableComponent
{

    protected $listeners = ['eliminar', 'activar', 'render'];

    public function columns(): array
    {
        return [
            Column::make('Imagen', 'imagen')
                ->format(function ($value, $column, $row) {
                    return view('admin.imagen_categoria')->withCategoria($row);
                }),
            Column::make('Nombre', 'nombre')
                ->sortable()
                ->searchable(),
            Column::make('Acciones', 'deleted_at')
                ->sortable()
                ->format(function ($value, $column, $row) {
                    return view('admin.acciones_categoria')->withCategoria($row);
                }),
        ];
    }

    public function query(): Builder
    {
        return Categoria::query()->withTrashed();
    }

    public function eliminar($id)
    {
        $categoria = Categoria::where('id', $id)->first();
        Producto::where('categoria_id', $categoria->id)->unsearchable();
        $categoria->delete();
        $this->dispatchBrowserEvent('successCategoriaAlert', 'inhabilitar');
    }

    public function activar($id)
    {
        Categoria::where('id', $id)->restore();
        Producto::where('categoria_id', $id)->searchable();
        $this->dispatchBrowserEvent('successCategoriaAlert', 'habilitar');
    }
}
