<?php

namespace App\Http\Controllers\emprendedor;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    public function index()
    {
        $eliminados = Producto::onlyTrashed()->where('tienda_id',auth()->user()->tienda->id)->get()->count();
        return view('emprendedor.productos',compact('eliminados'));
    }

    public function store(Producto $producto, Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:2048'
        ]);
        if($producto->imagenes->count() <= 9){
            $url = Storage::putFile('public/images/productos', $request->file('file'));
            $producto->imagenes()->create([
                'url' => $url,
                'prioridad' => $producto->prioridad + 1,
            ]);
            return response()->json(['OK' => $url]);
        }
        else{
            return response()->json(['Failed' => 'No se pueden subir más imágenes']);
        }
    }
}
