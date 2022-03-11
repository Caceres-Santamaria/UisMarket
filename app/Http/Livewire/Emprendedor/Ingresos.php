<?php

namespace App\Http\Livewire\Emprendedor;

use App\Models\Pedido;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use DateTime;

class Ingresos extends Component
{
    public $usuario, $tienda;
    public $order_by = 'Diariamente';
    public $year = "";
    public $ordenar = 'Generar por';
    public $monthYear = "";

    // protected function rules()
    // {
    //     return [
    //         'monthYear' => 'required|date|date_format:Y-m',
    //         'year' => 'required|min:2020|max:2099',
    //     ];
    // }

    public function mount()
    {
        $this->usuario = auth()->user();
        $this->tienda = auth()->user()->tienda;
    }

    public function render()
    {
        return view('livewire.emprendedor.ingresos')
            ->layoutData(['title' => 'Informe ingresos']);
    }

    public function busqueda()
    {
        if ($this->order_by == "Diariamente") {
            Validator::make(
                ['monthYear' => $this->monthYear],
                ['monthYear' => 'required|date|date_format:Y-m'],
                [
                    'required' => 'El :attribute es requerido',
                    'date' => 'El :attribute debe ser una fecha',
                    'date_format' => 'El :attribute debe tener el formato YYYY-mm'
                ],
                ['monthYear' => 'Mes']
            )->validate();
            $this->hydrate();
            $fechaI = new DateTime($this->monthYear . '-01');
            $fechaO = new DateTime($this->monthYear . '-01 23:59:59');
            $fechaI->modify('first day of this month');
            $fechaO->modify('last day of this month');
            $busqueda = Pedido::select(DB::raw("DAY(created_at) as dia, SUM(total) as total"))
                ->where('tienda_id', $this->tienda->id)
                ->where('estado', '4')
                ->groupBy('dia')
                ->whereBetween('created_at', [$fechaI->format('Y-m-d H:i:s'), $fechaO->format('Y-m-d H:i:s')])
                ->orderBy('dia')
                ->get();
            $datos = datosD($busqueda, $fechaO->format('d'));
            $this->dispatchBrowserEvent('updateChart', ['label' => $datos[0], 'data' => $datos[1], 'tipo' => 'dia']);
        } else if ($this->order_by == "Mensualmente") {
            Validator::make(
                ['year' => $this->year],
                ['year' => 'required|numeric|min:2020|max:2099'],
                [
                    'required' => 'El :attribute es requerido o numérico',
                    'numeric' => 'El :attribute debe ser un año con formato YYYY',
                    'min' => 'El :attribute mínimo es 2020',
                    'max' => 'El :attribute máximo es 2099'
                ],
                ['year' => 'Año']
            )->validate();
            $this->hydrate();
            $busqueda = Pedido::select(DB::raw("MONTH(created_at) as mes, SUM(total) as total"))
                ->where('tienda_id', $this->tienda->id)
                ->where('estado', '4')
                ->groupBy('mes')
                ->whereBetween('created_at', [$this->year . '-01-01 00:00:00', $this->year . '-12-31 23:59:59'])
                ->orderBy('mes')
                ->get();
            $meses = [
                'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
                'Octubre', 'Noviembre', 'Diciembre'
            ];
            if (empty($busqueda->all())) {
                $this->dispatchBrowserEvent('updateChart', ['label' => $meses, 'data' => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], 'tipo' => 'mes']);
            } else {
                $datos = datosM($busqueda);
                $this->dispatchBrowserEvent('updateChart', ['label' => $meses, 'data' => $datos, 'tipo' => 'mes']);
            }
        }
    }

    public function updatedOrderBy(){
        $this->dispatchBrowserEvent('resetChart',['tipo' => $this->order_by]);
        $this->reset('year');
        $this->reset('monthYear');
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
