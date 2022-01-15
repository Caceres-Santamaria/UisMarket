<?php

namespace App\Http\Controllers\Emprendedor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pedido;

class pedidoController extends Controller
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
    return back();
  }

  public function updateConfirmacion(Pedido $pedido)
  {
    $pedido->estado = 2;
    $pedido->save();
    return back();
  }

  public function delete(Pedido $pedido)
  {
    $pedido->estado = 5;
    $pedido->cancelado_autor = 2;
    $pedido->save();
    return back();
  }
}
