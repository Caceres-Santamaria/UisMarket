<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\emprendedor\pedidoController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\emprendedor\ProductosController;
use App\Http\Controllers\emprendedor\TiendasController;

Route::get('tienda/pedidos', [pedidoController::class, 'index'])->name('emprendedor.pedidos');
Route::get('tienda/pedidos/{pedido}', [pedidoController::class, 'show'])->name('emprendedor.ver_pedidos');

Route::get('productos',[ProductosController::class,'index'])->name('emprendedor.productos');
