<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\emprendedor\pedidoController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\emprendedor\ProductoController;
use App\Http\Controllers\emprendedor\TiendaController;
use App\Http\Livewire\Emprendedor\CrearProducto;
use App\Http\Livewire\Emprendedor\Tienda;
use App\Http\Livewire\Emprendedor\EditarProducto;
use App\Http\Livewire\Emprendedor\Rotacion;
use App\Http\Livewire\Emprendedor\Ingresos;

Route::get('tienda/editar/{tienda}', Tienda::class)->name('tienda.edit')->middleware('tienda.creada');
Route::get('tienda/', [TiendaController::class, 'show'])->name('tienda.show');
Route::patch('tienda/', [TiendaController::class, 'activar'])->name('tienda.activar');
Route::delete('tienda/', [TiendaController::class, 'desactivar'])->name('tienda.desactivar');

Route::get('tienda/productos', [ProductoController::class, 'index'])->name('tienda.productos');
Route::get('tienda/productos/crear', CrearProducto::class)->name('tienda.productos.crear');
Route::get('tienda/productos/editar/{producto}', EditarProducto::class)->name('tienda.productos.editar');
Route::post('tienda/productos/imagenes/{producto}', [ProductoController::class, 'store'])->name('tienda.productos.imagenes');

Route::get('pedidos', [pedidoController::class, 'index'])->name('emprendedor.pedidos');
Route::get('pedidos/{pedido}', [pedidoController::class, 'show'])->name('emprendedor.ver_pedidos');
Route::put('pedidos/{pedido}', [pedidoController::class, 'update'])->name('emprendedor.pedidos.update');
Route::patch('pedidos/{pedido}', [pedidoController::class, 'updateConfirmacion'])->name('emprendedor.pedidos.updateConfirmacion');
Route::delete('pedidos/{pedido}', [pedidoController::class, 'delete'])->name('emprendedor.pedidos.delete');

Route::get('informes/rotacion',Rotacion::class)->name('informes.rotacion');
Route::get('informes/ingresos',Ingresos::class)->name('informes.ingresos');
