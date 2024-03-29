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

    protected $listeners = ['render'];

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
        if($this->carnet){
            if ($oldCarnet = $this->tienda->carnet) {
                Storage::disk('public')->delete($oldCarnet);
            }
            $this->tienda->carnet = $this->carnet->store('/images/carnets', 'public');
        }
        $this->tienda->estado = '0';
        $this->tienda->comentario = null;
        $this->modal = false;
        $this->tienda->save();
        return redirect()->route('tienda.show');
    }

    public function solicitarRevision()
    {
        $this->tienda->revision = 1;
        $this->tienda->save();
    }

    public function render()
    {
        return view('livewire.emprendedor.modal-comentarios-soli');
    }
}
