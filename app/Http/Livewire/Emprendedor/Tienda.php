<?php

namespace App\Http\Livewire\Emprendedor;

use App\Models\Ciudad;
use App\Models\Departamento;
use App\Models\Envio;
use App\Models\Tienda as ModelsTienda;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Tienda extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;
    public $logo;
    public $portada;
    public ModelsTienda $tienda;
    public $costos = [];
    public $ciudades = [];
    public $departamentos, $ciudade = [];
    public $departamento_id = "";

    protected function rules()
    {
        return [
            'logo' => 'nullable | image | max:2048',
            'portada' => 'nullable | image | max:2048',
            'tienda.nombre' => 'required | max:50 | min:3',
            'tienda.descripcion' => 'required | max:2000',
            'tienda.direccion' => 'max:100',
            'tienda.telefono' => 'required | digits:10',
            'tienda.email' => 'required | email | max:191',
            'tienda.facebook' => 'max:191',
            'tienda.whatsapp' => 'max:191',
            'tienda.instagram' => 'max:191',
            'tienda.messenger' => 'max:191',
            'tienda.slug' => [
                'required', 'alpha_dash',
                Rule::unique('tiendas', 'slug')->ignore($this->tienda)
            ],
            'tienda.recoger_tienda' => ['required', 'in:0,1'],
            'tienda.ciudad_id' => 'required',
            'tienda.user_id' => 'required',
        ];
    }

    public function mount(ModelsTienda $tienda)
    {
        if($tienda->id == null){
            $this->authorize('create', ModelsTienda::class);
        }
        else{
            $this->authorize('update', $tienda);
        }
        $this->tienda = $tienda;
        $this->tienda->user_id = $this->tienda->user_id == null ? auth()->user()->id : $this->tienda->user_id;

        if($this->tienda->ciudad_id != null){
            $this->departamento_id = $this->tienda->ciudad->departamento->id;
            $this->ciudade = Ciudad::where('departamento_id', $this->departamento_id)->get();
        }
        else{
            $this->tienda->ciudad_id = "";
        }

        if(empty($this->tienda->envios->all())){
            foreach (Ciudad::all() as $ciudad) {
                $this->costos[$ciudad->id] = null;
                $this->ciudades[$ciudad->id] = $ciudad->nombre;
            }
        }
        else{
            foreach($this->tienda->envios as $ciudad){
                $this->costos[$ciudad->id] = $ciudad->envio->costo;
                $this->ciudades[$ciudad->id] = $ciudad->nombre;
            }
        }
        $this->departamentos = Departamento::all();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedDepartamentoId($value)
    {
        $this->ciudade = Ciudad::where('departamento_id', $value)->get();
        $this->tienda->ciudad_id = "";
    }

    public function uploadLogo()
    {
        if ($oldLogo = $this->tienda->logo) {
            Storage::disk('public')->delete($oldLogo);
        }
        return $this->logo->store('/images/logos', 'public');
    }

    public function uploadPortada()
    {
        if ($oldPortada = $this->tienda->fondo_img) {
            Storage::disk('public')->delete($oldPortada);
        }
        return $this->portada->store('/images/portadas', 'public');
    }

    public function modificarCosto($ciudad, $costo, $nombre)
    {
        if (array_key_exists($ciudad, $this->costos)) {
            $this->costos[$ciudad] = null;
            Validator::make(
                ['costo-' . $ciudad => $costo],
                ['costo-' . $ciudad => 'required|numeric|min:0'],
                [
                    'required' => 'El :attribute es requerido o deber ser numérico',
                    'numeric' => 'El :attribute debe ser numérico',
                    'min' => 'El :attribute debe ser positivo'
                ],
                ['costo-' . $ciudad => 'Costo de ' . $nombre]
            )->validate();
            // $this->addError('costo'.$ciudad, 'message');
            $this->costos[$ciudad] = (int)$costo;
        }
    }

    public function validarCostos()
    {
        foreach ($this->costos as $clave => $valor){
            if($valor === null){
                return false;
            }
        }
        return true;
    }

    public function save()
    {
        $this->tienda->slug = Str::slug($this->tienda->nombre);
        $this->validate();
        if($this->validarCostos()){
            if ($this->logo) {
                $this->tienda->logo = $this->uploadLogo();
            }

            if ($this->portada) {
                $this->tienda->fondo_img = $this->uploadPortada();
            }
            $this->tienda->save();
            if(empty($this->tienda->envios->all())){
                foreach ($this->costos as $clave => $valor){
                    Envio::create([
                        'costo' => $valor,
                        'ciudad_id' => $clave,
                        'tienda_id' => $this->tienda->id
                    ]);
                }
            }
            else{
                foreach ($this->costos as $clave => $valor){
                    $this->tienda->envios()->updateExistingPivot($clave, [
                        'costo' => $valor,
                    ]);
                }
            }
            if(auth()->user()->rol == '3'){
                User::where('id', auth()->user()->id)->update(['rol' => '2']);
            }
            return redirect()->route('tienda.show');
        }else{
            $this->addError('costos', 'Error, Verifica el costo de las ciudades');
        }
    }

    public function render()
    {
        return view('livewire.emprendedor.tienda')
            ->layoutData(['title' => 'Crear Tienda']);
    }
}
