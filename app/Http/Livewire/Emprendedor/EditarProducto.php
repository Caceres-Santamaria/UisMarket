<?php

namespace App\Http\Livewire\Emprendedor;

use App\Models\Categoria;
use App\Models\ImagenProducto;
use App\Models\Producto;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EditarProducto extends Component
{
    use AuthorizesRequests;
    public Producto $producto;
    public $categorias, $cantidad;

    protected $listeners = ['refrescarProducto','render'];

    protected function rules()
    {
        return [
            'producto.categoria_id' => 'required',
            'producto.nombre' => 'required',
            // 'slug' => ['required',Rule::unique('productos', 'slug')->ignore($this->producto->id)],
            'producto.descripcion' => 'required',
            'producto.precio' => 'required|numeric|min:0',
            'producto.descuento' => 'required|numeric|min:0|max:1',
            'producto.publicacion' => 'required|in:1,2',
            'producto.estado' => 'required',
            'producto.cantidad' => [Rule::requiredIf($this->cantidad != null),'min:0'],
            'producto.publicacion' => 'required|in:1,2',
            'producto.descuento' => 'required|numeric|min:0|max:1',
        ];
    }

    public function mount(Producto $producto){
        $this->authorize('update', $producto);
        $this->producto = $producto;
        $this->categorias = Categoria::all();
        $this->cantidad = $this->producto->cantidad;
        // $this->slug = $this->producto->slug;
    }

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

    // public function updatedProductoNombre($value)
    // {
    //     $this->slug = Str::slug($value).'-'.$this->producto->id;
    // }

    public function refrescarProducto(){
        $this->producto = $this->producto->fresh();
    }

    public function save(){
        $this->validate();
        // Validator::make(
        //     ['slug' => $this->producto->slug],
        //     ['slug' => ['required',Rule::unique('productos', 'slug')->ignore($this->producto->id)]]
        // )->validate();
        // $this->producto->slug = $this->slug;
        $this->producto->save();
        $this->emit('saved');
    }

    public function deleteImagen(ImagenProducto $imagen){
        Storage::delete([$imagen->url]);
        $imagen->delete();
        $this->producto = $this->producto->fresh();
        if($this->producto->imagenes->count() == 0){
            $this->producto->publicacion = 1;
            $this->producto->save();
            $this->producto = $this->producto->fresh();
            $this->emitTo('emprendedor.estado-producto','mount',$this->producto);
        }
    }

    public function render()
    {
        return view('livewire.emprendedor.editar-producto')
            ->layoutData(['title' => 'Editar Producto']);
    }
}
