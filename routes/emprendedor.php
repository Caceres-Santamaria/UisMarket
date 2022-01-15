<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\emprendedor\pedidoController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\emprendedor\ProductosController;
use App\Http\Controllers\emprendedor\TiendasController;
use App\Http\Livewire\CrearTienda;

Route::get('tienda/pedidos', [pedidoController::class, 'index'])->name('emprendedor.pedidos');
Route::get('tienda/pedidos/{pedido}', [pedidoController::class, 'show'])->name('emprendedor.ver_pedidos');

Route::get('tienda/editar/{tienda}', CrearTienda::class)->name('tienda.editar')->middleware('tienda.creada');

Route::get('productos',[ProductosController::class,'index'])->name('emprendedor.productos');
