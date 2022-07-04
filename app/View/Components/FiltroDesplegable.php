<?php

namespace App\View\Components;

use Illuminate\View\Component;

class filtroDesplegable extends Component
{
    public array $filtros = [];
    public array $keys = [];
    public $sort;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($filtro = 'productos', $sort = 'nombre_asc')
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
                'Alfabéticamente: A-Z',
                'Alfabéticamente: Z-A',
                'Más nuevas',
                'Más antiguas',
                'Mejor valoradas',
                'Menor valoradas'
            ];

            $this->keys = [
                'nombre_asc',
                'nombre_desc',
                'mas_reciente',
                'menos_recientes',
                'mejor_valoradas',
                'menor_valoradas'
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
                'Alfabéticamente: A-Z',
                'Alfabéticamente: Z-A',
                'Precio: Menor a mayor',
                'Precio: Mayor a menor',
                'Más recientes',
                'Más antiguos'
            ];

            $this->keys = [
                'nombre_asc',
                'nombre_desc',
                'precio_asc',
                'precio_desc',
                'mas_reciente',
                'menos_recientes'
            ];
        } else {
            $this->filtros = [];
            $this->keys = [];
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
