<?php

namespace App\Http\Livewire\Emprendedor;

use App\Models\Categoria;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use App\Models\Producto;

class CrearProducto extends Component
{
    public $categorias;
    public $categoria_id = "";
    public $nombre, $descripcion, $precio, $estado, $color = '', $talla = '', $cantidad;


    protected function rules()
    {
        return [
            'categoria_id' => 'required',
            'nombre' => 'required',
            // 'slug' => 'required|alpha_dash',
            'descripcion' => 'required',
            'precio' => 'required|numeric|min:0',
            'estado' => 'required | in:nuevo,usado',
            'color' => 'required|in:0,1',
            'talla' => 'required|in:0,1'
        ];
    }

    protected $validationAttributes = [
        'categoria_id' => "categoría",
        'descripcion' => "descripción",
    ];

    public function mount()
    {
        $this->categorias = Categoria::all();
    }

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

    // public function updatedNombre($value)
    // {
    //     $this->slug = Str::slug($value);
    // }

    public function save()
    {
        if($this->talla == 1) {
            $this->color = 1;
        }
        $this->validate();
        if ($this->color == 0 && $this->talla == 0) {
            Validator::make(
                ['cantidad' => $this->cantidad],
                ['cantidad' => 'required | numeric | min:0']
            )->validate();
        } else {
            $this->cantidad = null;
        }
        $producto = new Producto();
        $producto->nombre = $this->nombre;
        $producto->descripcion = $this->descripcion;
        $producto->precio = $this->precio;
        $producto->categoria_id = $this->categoria_id;
        $producto->estado = $this->estado;
        $producto->cantidad = $this->cantidad;
        $producto->color = $this->color;
        $producto->talla = $this->talla;
        $producto->tienda_id = auth()->user()->tienda->id;

        $producto->save();
        // $producto->slug = $this->slug.'-'.$producto->id;
        // $producto->save();

        return redirect()->route('tienda.productos.editar', $producto);
    }

    public function render()
    {
        return view('livewire.emprendedor.crear-producto')
            ->layoutData(['title' => 'Crear Producto']);
    }
}
