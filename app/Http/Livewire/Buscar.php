<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;

class Buscar extends Component
{
    public $busqueda = "";

    public function render()
    {
        if($this->busqueda == ""){
            $productos = [];
            $cantidad = 0;
        }
        else{
            // $productos = Producto::where('nombre','LIKE',"%".$this->busqueda."%")
            //     ->where('publicacion',2)
            //     ->whereRelation('tienda','deleted_at',null)
            //     ->whereRelation('tienda','estado','1');
            // $productos = Producto::search($this->busqueda, function($meilisearch, $query, $options){
            //     if(){
            //         $options['filters'] = 'id='.$user_id
            //     }
            //     return $meilisearch->search($query, $options);
            // })->get();
            $productos = Producto::search($this->busqueda)->get();
            $cantidad = $productos->count();
            $productos = $productos->take(6);
        }
        return view('livewire.buscar',compact('productos','cantidad'));
    }
}
