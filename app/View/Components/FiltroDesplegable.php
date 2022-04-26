<?php

namespace App\View\Components;

use Illuminate\View\Component;

class filtroDesplegable extends Component
{
    public array $filtros = [];
    public $sort;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($filtro = 'productos', $sort = 'Alfabéticamente: A-Z')
    {
        if ($filtro == 'tiendas') {
            switch ($sort) {
                case 'nombre_asc':
                    $this->sort = 'Alfabéticamente: A-Z';
                    break;
                case 'nombre_desc':
                    $this->sort = 'Alfabéticamente: Z-A';
                    break;
                case 'mas_reciente':
                    $this->sort = 'Más nuevas';
                    break;
                case 'menos_recientes':
                    $this->sort = 'Más antiguas';
                    break;
                case 'mejor_valoradas':
                    $this->sort = 'Mejor valoradas';
                    break;
                case 'menor_valoradas':
                    $this->sort = 'Menor valoradas';
                    break;
                default:
                    $this->sort = 'Alfabéticamente: A-Z';
            }

            $this->filtros = [
                'Alfabéticamente: A-Z' => 'nombre_asc',
                'Alfabéticamente: Z-A' => 'nombre_desc',
                'Más nuevas' => 'mas_reciente',
                'Más antiguas' => 'menos_recientes',
                'Mejor valoradas' => 'mejor_valoradas',
                'Menor valoradas' => 'menor_valoradas'
            ];
        } elseif ($filtro == 'productos') {
            switch ($sort) {
                case 'nombre_asc':
                    $this->sort = 'Alfabéticamente: A-Z';
                    break;
                case 'nombre_desc':
                    $this->sort = 'Alfabéticamente: Z-A';
                    break;
                case 'mas_reciente':
                    $this->sort = 'Más recientes';
                    break;
                case 'menos_recientes':
                    $this->sort = 'Más antiguos';
                    break;
                default:
                    $this->sort = 'Alfabéticamente: A-Z';
            }

            $this->filtros = [
                'Alfabéticamente: A-Z' => 'nombre_asc',
                'Alfabéticamente: Z-A' => 'nombre_desc',
                'Precio: Menor a mayor' => 'precio_asc',
                'Precio: Mayor a menor' => 'precio_desc',
                'Más recientes' => 'mas_reciente',
                'Más antiguos' => 'menos_recientes'
            ];
        } else {
            $this->filtros = [];
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.filtro-desplegable');
    }
}
