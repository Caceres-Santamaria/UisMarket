<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tienda;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Solicitudes extends DataTableComponent
{
    protected $listeners = ['aprobar', 'rechazar'];

    public function columns(): array
    {
        return [
            Column::make('Tienda', 'nombre')
                ->sortable()
                ->searchable(),
            Column::make('Usuario', 'usuario.name')
                ->searchable(),
            Column::make('Correo', 'usuario.email')
                ->searchable(),
            Column::make('Fecha', 'created_at')
                ->sortable()
                ->format(function ($value, $column, $row) {
                    return $value->diffForHumans();
                }),
            Column::make('Acciones')
                ->format(function ($value, $column, $row) {
                    return view('admin.acciones_solicitudes')->withTienda($row);
                }),
        ];
    }

    public function query(): Builder
    {
        return Tienda::query()->where('estado', '0');
    }
    public function aprobar(Tienda $tienda): void
    {
        $tienda->estado = '1';
        $tienda->save();
    }
    public function rechazar(Tienda $tienda): void
    {
        $tienda->estado = '3';
        $tienda->save();
    }
}
