<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Categoria;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Categorias extends DataTableComponent
{

    protected $listeners = ['eliminar', 'activar'];

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
        $categoria->delete();
        $this->dispatchBrowserEvent('successCategoriaAlert', 'inhabilitar');
    }

    public function activar($id)
    {
        $categoria = Categoria::where('id', $id)->restore();
        $this->dispatchBrowserEvent('successCategoriaAlert', 'habilitar');
    }
}
