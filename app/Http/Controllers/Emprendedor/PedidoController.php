<?php

namespace App\Http\Controllers\Emprendedor;

use App\Http\Controllers\Controller;
use App\Mail\PedidoEnviado;
use Illuminate\Http\Request;
use App\Models\Pedido;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class PedidoController extends Controller
{
    public function index()
    {

        $pedido = Pedido::query()->where('tienda_id', auth()->user()->tienda->id);
        $pendiente = (clone $pedido)->where('estado', 1)->count();
        $preparando = (clone $pedido)->where('estado', 2)->count();
        $enviado = (clone $pedido)->where('estado', 3)->count();
        $entregado = (clone $pedido)->where('estado', 4)->count();
        $cancelado = $pedido->where('estado', 5)->count();

        return view('emprendedor.pedidos', compact('pendiente', 'preparando', 'enviado', 'entregado', 'cancelado'));
    }

    public function show(Pedido $pedido)
    {
        $this->authorize('view', $pedido);

        $detalle = json_decode($pedido->detalle);
        $envio = json_decode($pedido->envio);
        return view('emprendedor.ver_pedidos', compact('pedido', 'detalle', 'envio'));
    }

    public function update(Pedido $pedido)
    {
        $pedido->estado = 3;
        $pedido->save();
        Cache::tags('pedidos-usuario')->flush();
//        Mail::to("a1098818855@gmail.com")->queue(new PedidoEnviado($pedido,auth()->user()->tienda));
        // return new PedidoEnviado($pedido,auth()->user()->tienda);
        // $pedido->usuario->email
        return back();
    }

    public function updateConfirmacion(Pedido $pedido)
    {
        if($pedido->estado != 5){
            $pedido->estado = 2;
            $pedido->save();
            Cache::tags('pedidos-usuario')->flush();
            return back();
        }
        else{
            return back()->with('message','El pedido ha sido cancelado por el cliente');
        }
    }

    public function delete(Pedido $pedido)
    {
        $pedido->estado = 5;
        $pedido->cancelado_autor = 2;
        $pedido->save();
        Cache::tags('pedidos-usuario')->flush();
        return back();
    }
}
