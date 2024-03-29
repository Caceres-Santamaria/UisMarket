<?php

namespace App\Http\Controllers\Emprendedor;

use App\Http\Controllers\Controller;
use App\Mail\PedidoEnviado;
use App\Models\Pedido;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PedidoController extends Controller
{
    public function index()
    {
        // $pedido = Pedido::query()->where('tienda_id', auth()->user()->tienda->id);
        $pedido = DB::table('pedidos')
            ->select('estado',DB::raw('count(*) as count'))
            ->where('tienda_id', auth()->user()->tienda->id)
            ->whereIn('estado', ['1', '2', '3', '4', '5'])
            ->groupBy('estado')
            ->get();
        // $pendiente  = (clone $pedido)->where('estado', 1)->count();
        // $preparando = (clone $pedido)->where('estado', 2)->count();
        // $enviado    = (clone $pedido)->where('estado', 3)->count();
        // $entregado  = (clone $pedido)->where('estado', 4)->count();
        // $cancelado  = $pedido->where('estado', 5)->count();
        $pendiente  = $pedido->contains('estado', '1') ? $pedido->firstWhere('estado', '1')->count : 0;
        $preparando = $pedido->contains('estado', '2') ? $pedido->firstWhere('estado', '2')->count : 0;
        $enviado    = $pedido->contains('estado', '3') ? $pedido->firstWhere('estado', '3')->count : 0;
        $entregado  = $pedido->contains('estado', '4') ? $pedido->firstWhere('estado', '4')->count : 0;
        $cancelado  = $pedido->contains('estado', '5') ? $pedido->firstWhere('estado', '5')->count : 0;
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
        if ($pedido->estado != 5) {
            $pedido->estado = 2;
            $pedido->save();
            Cache::tags('pedidos-usuario')->flush();
            return back();
        } else {
            return back()->with('message', 'El pedido ha sido cancelado por el cliente');
        }
    }

    public function delete(Pedido $pedido)
    {
        if ($pedido->estado != 5) {
            $pedido->estado = 5;
            $pedido->cancelado_autor = 2;
            for ($i = 0; $i < sizeof(json_decode($pedido->detalle)); $i++) {
                incrementarCantidad(json_decode($pedido->detalle)[$i]);
            }
            $pedido->save();
            Cache::tags('pedidos-usuario')->flush();
            return back();
        } else {
            return back()->with('message', 'El pedido ya ha sido cancelado por el cliente');
        }
    }
}
