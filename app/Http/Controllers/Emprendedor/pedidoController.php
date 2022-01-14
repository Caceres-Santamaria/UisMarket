<?php

namespace App\Http\Controllers\Emprendedor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pedido;

class pedidoController extends Controller
{
  public function index()
  {

    $pedidos = Pedido::query()->where('estado', '<>', 1);

    if (request('estado')) {
      $pedidos->where('estado', request('estado'));
    }

    $pedidos = $pedidos->get();


    $pendiente = Pedido::where('estado', 1)->count();
    $preparando = Pedido::where('estado', 2)->count();
    $enviado = Pedido::where('estado', 3)->count();
    $entregado = Pedido::where('estado', 4)->count();
    $cancelado = Pedido::where('estado', 5)->count();

    return view('emprendedor.pedidos', compact('pedidos', 'pendiente', 'preparando', 'enviado', 'entregado', 'cancelado'));
  }
  public function show(Pedido $pedido)
  {
    $this->authorize('view', $pedido);

    $detalle = json_decode($pedido->detalle);
    $envio = json_decode($pedido->envio);
    return view('emprendedor.ver_pedidos', compact('pedido', 'detalle', 'envio'));
  }
}
