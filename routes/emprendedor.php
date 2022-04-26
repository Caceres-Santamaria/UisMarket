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
Route::controller(TiendaController::class)->group(function () {
    Route::get('tienda/', 'show')->name('tienda.show');
    Route::patch('tienda/', 'activar')->name('tienda.activar');
    Route::delete('tienda/', 'desactivar')->name('tienda.desactivar');
});
Route::middleware(['is.tienda.activa'])->group(function () {
    Route::get('tienda/editar/{tienda}', Tienda::class)->name('tienda.edit')->middleware('tienda.creada');

    Route::get('tienda/productos', [ProductoController::class, 'index'])->name('tienda.productos');
    Route::view('tienda/productos/eliminados', 'emprendedor.productos-eliminados')->name('tienda.productos.eliminados');
    Route::get('tienda/productos/crear', CrearProducto::class)->name('tienda.productos.crear');
    Route::get('tienda/productos/editar/{producto}', EditarProducto::class)->name('tienda.productos.editar');
    Route::post('tienda/productos/imagenes/{producto}', [ProductoController::class, 'store'])->name('tienda.productos.imagenes');

    Route::controller(PedidoController::class)->group(function () {
        Route::get('pedidos', 'index')->name('emprendedor.pedidos');
        Route::get('pedidos/{pedido}', 'show')->name('emprendedor.ver_pedidos');
        Route::put('pedidos/{pedido}', 'update')->name('emprendedor.pedidos.update');
        Route::patch('pedidos/{pedido}', 'updateConfirmacion')->name('emprendedor.pedidos.updateConfirmacion');
        Route::delete('pedidos/{pedido}', 'delete')->name('emprendedor.pedidos.delete');
    });

    Route::get('informes/rotacion', Rotacion::class)->name('informes.rotacion');
    Route::get('informes/ingresos', Ingresos::class)->name('informes.ingresos');
});
