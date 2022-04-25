<?php

namespace App\Http\Livewire\Admin;

use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearCategoria extends Component
{
    use WithFileUploads;
    public $image;
    public Categoria $categoria;

    protected $listeners = ['save', 'recibirCategoria'];

    protected function rules()
    {
        return [
            'image' => [
                'image', 'max:2048', 'nullable',
                Rule::requiredIf(!$this->categoria->id)
            ],
            'categoria.nombre' => [
                'required', 'max:50', 'min:3',
                Rule::unique('categorias', 'nombre')->ignore($this->categoria)],
            'categoria.slug' => [
                'required', 'alpha_dash',
                Rule::unique('categorias', 'slug')->ignore($this->categoria)
            ],
        ];
    }
    public function mount(Categoria $categoria)
    {
        $this->categoria = $categoria;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function uploadImagen()
    {
        if ($oldImage = $this->categoria->imagen) {
            Storage::disk('public')->delete($oldImage);
        }
        return $this->image->store('/images/categorias', 'public');
    }

    public function save()
    {
        $this->categoria->slug = Str::slug($this->categoria->nombre);
        // dd($this->rules());
        $this->validate();
        if ($this->image) {
            $this->categoria->imagen = $this->uploadImagen();
        }
        $this->categoria->save();
        $this->dispatchBrowserEvent('save','La categoría se ha creado o modificado exitosamente');
        $this->categoria = new Categoria();
        $this->image = null;
        $this->emitTo('admin.categorias','render');
        // return redirect()->route('admin.categorias')->with('message', 'La categoría se ha creado o modificado exitosamente');
    }

    public function render()
    {
        // dd($this->categoria);
        return view('livewire.admin.crear-categoria')
            ->layout('layouts.admin', ['title' => 'Categorias']);
    }

    public function recibirCategoria($slug){
        $this->categoria = Categoria::where('slug',$slug)->withTrashed()->firstOrFail();
    }
}
