<?php

namespace App\View\Components;

use App\Models\Producto;
use App\Models\Tienda;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class Slider extends Component
{
    public $id;
    public $productos = [];
    public $tipo;
    public $nuevas = [];
    public $destacadas = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $tipo = "productos", $data = [])
    {
        $this->id = $id;
        $this->tipo = $tipo;
        switch ($this->tipo) {
            case "productos":
                $this->productos = $data;
                break;
            case "destacadas":
                $this->destacadas = $data;
                break;
            case "nuevas":
                $this->nuevas = $data;
                break;
            default:
                $this->productos = $data;
                break;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.slider');
    }
}
