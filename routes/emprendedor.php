<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\emprendedor\pedidoController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\emprendedor\ProductosController;
use App\Http\Controllers\emprendedor\TiendasController;
use App\Http\Livewire\CrearTienda;


Route::get('tienda/editar/{tienda}', CrearTienda::class)->name('tienda.edit')->middleware('tienda.creada');

Route::get('productos', [ProductosController::class, 'index'])->name('emprendedor.productos');

Route::get('pedidos', [pedidoController::class, 'index'])->name('emprendedor.pedidos');
Route::get('pedidos/{pedido}', [pedidoController::class, 'show'])->name('emprendedor.ver_pedidos');
Route::put('pedidos/{pedido}', [pedidoController::class, 'update'])->name('emprendedor.pedidos.update');
Route::patch('pedidos/{pedido}', [pedidoController::class, 'updateConfirmacion'])->name('emprendedor.pedidos.updateConfirmacion');
Route::delete('pedidos/{pedido}', [pedidoController::class, 'delete'])->name('emprendedor.pedidos.delete');
