<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    public function index()
    {
        // $pedido = Pedido::query()->where('usuario_id', auth()->user()->id);
        $pedido = DB::table('pedidos')
            ->select('estado', DB::raw('count(*) as count'))
            ->where('usuario_id', auth()->user()->id)
            ->whereIn('estado', ['1', '2', '3', '4', '5'])
            ->groupBy('estado')
            ->get();
        // $pendiente = (clone $pedido)->where('estado', 1)->count();
        // $recibido = (clone $pedido)->where('estado', 2)->count();
        // $enviado = (clone $pedido)->where('estado', 3)->count();
        // $entregado = (clone $pedido)->where('estado', 4)->count();
        // $cancelado = $pedido->where('estado', 5)->count();
        $pendiente  = $pedido->contains('estado', '1') ? $pedido->firstWhere('estado', '1')->count : 0;
        $recibido   = $pedido->contains('estado', '2') ? $pedido->firstWhere('estado', '2')->count : 0;
        $enviado    = $pedido->contains('estado', '3') ? $pedido->firstWhere('estado', '3')->count : 0;
        $entregado  = $pedido->contains('estado', '4') ? $pedido->firstWhere('estado', '4')->count : 0;
        $cancelado  = $pedido->contains('estado', '5') ? $pedido->firstWhere('estado', '5')->count : 0;
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
        Cache::tags('pedidos-usuario')->flush();
        return back();
    }

    public function delete(Pedido $pedido)
    {
        if ($pedido->estado != 5) {
            $pedido->estado = 5;
            $pedido->cancelado_autor = 1;
            for ($i = 0; $i < sizeof(json_decode($pedido->detalle)); $i++) {
                incrementarCantidad(json_decode($pedido->detalle)[$i]);
            }
            $pedido->save();
            Cache::tags('pedidos-usuario')->flush();
            return back();
        } else {
            return back()->with('message', 'El pedido ya ha sido cancelado por el emprendedor');
        }
    }
}
