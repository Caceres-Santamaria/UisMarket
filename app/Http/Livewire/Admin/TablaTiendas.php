<?php

namespace App\Http\Livewire\Admin;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Tienda;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class TablaTiendas extends DataTableComponent
{

    protected $listeners = ['suspender'];
    public $modal = false;

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
            Column::make('★')
                ->format(function ($value, $column, $row) {
                    return $row->calificacion[0];
                }),
            Column::make('Acciones', 'deleted_at')
                ->sortable()
                ->format(function ($value, $column, $row) {
                    return view('admin.acciones_tienda')->withTienda($row);
                }),
        ];
    }
    // {{var_dump($tienda->calificacion)}}
    public function query(): Builder
    {
        return Tienda::query()->where('estado', '1');
    }

    public function suspender($id)
    {
        $tienda = Tienda::where('id', $id)->first();
        $tienda->estado = '2';
        $tienda->save();
        Producto::where('tienda_id', $tienda->id)->unsearchable();
    }

    // public function eliminar($id)
    // {
    //   $tienda = Tienda::where('id', $id)->first();
    //   $tienda->delete();
    //   $this->dispatchBrowserEvent('successTiendaAlert', 'inhabilitar');
    // }

    // public function activar($id)
    // {
    //   $tienda = Tienda::where('id', $id)->restore();
    //   $this->dispatchBrowserEvent('successTiendaAlert', 'habilitar');
    // }
}
