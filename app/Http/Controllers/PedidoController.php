<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoController extends Controller
{
    public function index()
    {
        $pedido = Pedido::query()->where('usuario_id', auth()->user()->id);
        $pendiente = (clone $pedido)->where('estado', 1)->count();
        $recibido = (clone $pedido)->where('estado', 2)->count();
        $enviado = (clone $pedido)->where('estado', 3)->count();
        $entregado = (clone $pedido)->where('estado', 4)->count();
        $cancelado = $pedido->where('estado', 5)->count();
        return view('pedidos.index', compact('pendiente', 'recibido', 'enviado', 'entregado', 'cancelado'));
    }

    public function show(Pedido $pedido)
    {

        $this->authorize('view', $pedido);

        $detalle = json_decode($pedido->detalle);
        $envio = json_decode($pedido->envio);

        return view('pedidos.show', compact('pedido', 'detalle', 'envio'));
    }

    public function update(Pedido $pedido)
    {
        $pedido->estado = 4;
        $pedido->save();
        return back();
    }

    public function delete(Pedido $pedido)
    {
        $pedido->estado = 5;
        $pedido->cancelado_autor = 1;
        $pedido->save();
        return back();
    }
}
