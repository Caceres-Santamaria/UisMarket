<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Emprendedor\PedidoController;
use App\Http\Controllers\Emprendedor\ProductoController;
use App\Http\Controllers\Emprendedor\TiendaController;
use App\Http\Livewire\Emprendedor\CrearProducto;
use App\Http\Livewire\Emprendedor\Tienda;
use App\Http\Livewire\Emprendedor\EditarProducto;
use App\Http\Livewire\Emprendedor\Rotacion;
use App\Http\Livewire\Emprendedor\Ingresos;
use Illuminate\Support\Facades\DB;

// DB::listen(function($query){
//     echo "<pre>{$query->sql}</pre>";
// });

Route::get('tienda/editar/{tienda}', Tienda::class)->name('tienda.edit')->middleware('tienda.creada');
Route::get('tienda/', [TiendaController::class, 'show'])->name('tienda.show');
Route::patch('tienda/', [TiendaController::class, 'activar'])->name('tienda.activar');
Route::delete('tienda/', [TiendaController::class, 'desactivar'])->name('tienda.desactivar');

Route::get('tienda/productos', [ProductoController::class, 'index'])->name('tienda.productos');
Route::view('tienda/productos/eliminados', 'emprendedor.productos-eliminados')->name('tienda.productos.eliminados');
Route::get('tienda/productos/crear', CrearProducto::class)->name('tienda.productos.crear');
Route::get('tienda/productos/editar/{producto}', EditarProducto::class)->name('tienda.productos.editar');
Route::post('tienda/productos/imagenes/{producto}', [ProductoController::class, 'store'])->name('tienda.productos.imagenes');

Route::get('pedidos', [PedidoController::class, 'index'])->name('emprendedor.pedidos');
Route::get('pedidos/{pedido}', [PedidoController::class, 'show'])->name('emprendedor.ver_pedidos');
Route::put('pedidos/{pedido}', [PedidoController::class, 'update'])->name('emprendedor.pedidos.update');
Route::patch('pedidos/{pedido}', [PedidoController::class, 'updateConfirmacion'])->name('emprendedor.pedidos.updateConfirmacion');
Route::delete('pedidos/{pedido}', [PedidoController::class, 'delete'])->name('emprendedor.pedidos.delete');

Route::get('informes/rotacion',Rotacion::class)->name('informes.rotacion');
Route::get('informes/ingresos',Ingresos::class)->name('informes.ingresos');
