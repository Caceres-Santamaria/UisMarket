<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pedido;

class pedidoController extends Controller
{
  public function index()
  {

    $pedidos = auth()->user()->pedidos;

    if (request('estado')) {
      $pedidos->where('estado', request('estado'));
    }

    $pedidos = $pedidos->get();


    $pendiente = Pedido::where('estado', 1)->where('usuario_id', auth()->user()->id)->count();
    $recibido = Pedido::where('estado', 2)->where('usuario_id', auth()->user()->id)->count();
    $enviado = Pedido::where('estado', 3)->where('usuario_id', auth()->user()->id)->count();
    $entregado = Pedido::where('estado', 4)->where('usuario_id', auth()->user()->id)->count();
    $anulado = Pedido::where('estado', 5)->where('usuario_id', auth()->user()->id)->count();


    return view('historial_pedidos', compact('pedidos', 'pendiente', 'recibido', 'enviado', 'entregado', 'anulado'));
  }

  // public function show(Pedido $pedido){

  //     $this->authorize('author', $pedido);

  //     $items = json_decode($pedido->content);
  //     $envio = json_decode($pedido->envio);

  //     return view('pedidos.show', compact('pedido', 'items', 'envio'));
  // }
}
