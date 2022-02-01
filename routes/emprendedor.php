<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\emprendedor\pedidoController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\emprendedor\ProductoController;
use App\Http\Controllers\emprendedor\TiendaController;
use App\Http\Livewire\Emprendedor\CrearProducto;
use App\Http\Livewire\Emprendedor\Tienda;
use App\Http\Livewire\Emprendedor\EditarProducto;

Route::get('tienda/editar/{tienda}', Tienda::class)->name('tienda.edit')->middleware('tienda.creada');
Route::get('tienda/', [TiendaController::class, 'show'])->name('tienda.show');

Route::get('tienda/productos', [ProductoController::class, 'index'])->name('tienda.productos');

Route::view('tienda/productos/eliminados', 'emprendedor.prod-eliminados')->name('tienda.productos-eliminados');

Route::get('tienda/productos/crear', CrearProducto::class)->name('tienda.productos.crear');
Route::get('tienda/productos/editar/{producto}', EditarProducto::class)->name('tienda.productos.editar');
Route::post('tienda/productos/imagenes/{producto}', [ProductoController::class, 'store'])->name('tienda.productos.imagenes');

Route::get('pedidos', [pedidoController::class, 'index'])->name('emprendedor.pedidos');
Route::get('pedidos/{pedido}', [pedidoController::class, 'show'])->name('emprendedor.ver_pedidos');
Route::put('pedidos/{pedido}', [pedidoController::class, 'update'])->name('emprendedor.pedidos.update');
Route::patch('pedidos/{pedido}', [pedidoController::class, 'updateConfirmacion'])->name('emprendedor.pedidos.updateConfirmacion');
Route::delete('pedidos/{pedido}', [pedidoController::class, 'delete'])->name('emprendedor.pedidos.delete');
