<?php

namespace App\Http\Livewire\Emprendedor;

use Illuminate\Support\Facades\Storage;
use App\Models\Tienda;
use Livewire\Component;
use Livewire\WithFileUploads;


class ModalComentariosSoli extends Component
{
    use WithFileUploads;
    public $modal = false;
    public $carnet;
    public Tienda $tienda;

    protected function rules()
    {
        return [
            'carnet' => 'required | image | max:2048',
        ];
    }

    public function mount($tienda)
    {
        $this->tienda = $tienda;
    }

    public function uploadCarnet()
    {
        dd($this->tienda->comentario);
        if ($oldCarnet = $this->tienda->carnet) {
            Storage::disk('public')->delete($oldCarnet);
        }
        return $this->carnet->store('/images/carnets', 'public');
    }

    public function render()
    {
        return view('livewire.emprendedor.modal-comentarios-soli');
    }
}
