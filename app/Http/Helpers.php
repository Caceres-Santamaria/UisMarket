<?php

use App\Models\Categoria;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Talla;
use Illuminate\Support\Facades\Storage;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;

/**
 * comprueba que la sesion de categoria esté creada
 * si no está creada, se crean.
 */
function comprobarCategoria(): void
{
    if (!request()->session()->has('categorias')) {
        $categorias = Categoria::orderBy('nombre', 'asc')->get();
        session(['categorias' => $categorias]);
    }
}

function fondo($fondo_img)
{
    if ($fondo_img) {
        $url = Storage::url($fondo_img);
        return "background-image:url('$url')";
    } else {
        return "background-color:rgb(186, 189, 194)";
    }
}

function splide($imagenProductos)
{
    if ($imagenProductos == 1) {
        return 'false';
    } else {
        return 'true';
    }
}

function slugToName($slug)
{
    $numeros = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
    $nombre = str_replace($numeros, "", $slug);
    return str_replace("-", " ", $nombre);
}

function stock($cantidad)
{
    return ($cantidad <= 0) ? 'sin-stock' : 'con-stock';
}

function sortByActive($sort_by)
{
    return (request()->sort_by == $sort_by) ? 'bg-gray-300' : '';
}

function setActive($route)
{
    return request()->routeIs($route) ? 'border-white' : 'border-primario-dark';
}

function setActiveProductos()
{
    return (request()->routeIs('productos.*') or request()->routeIs('categorias.show')) ? 'border-white' : 'border-primario-dark';
}

function setActiveAdmin($route)
{
    return request()->routeIs($route) ? 'text-primario-n hover:text-primario-dark2' : '';
}

function cantidad($producto_id, $color_id = null, $talla_id = null, $producto = null)
{
    if(!$producto) {
        $producto = Producto::find($producto_id);
    }

    if ($talla_id) {
        $talla = Talla::find($talla_id);
        $cantidad = $talla->colores->find($color_id)->pivot->cantidad;
    } elseif ($color_id) {
        $cantidad = $producto->colores->find($color_id)->pivot->cantidad;
    } else {
        $cantidad = $producto->cantidad;
    }
    return $cantidad;
}

function cantidad_agregada($producto_id, $color_id = null, $talla_id = null)
{

    $cart = Cart::content();

    $item = $cart->where('id', $producto_id)
        ->where('options.color_id', $color_id)
        ->where('options.talla_id', $talla_id)
        ->first();

    if ($item) {
        return $item->qty;
    } else {
        return 0;
    }
}

function cantidad_disponible($producto_id, $color_id = null, $talla_id = null, $producto = null)
{

    return cantidad($producto_id, $color_id, $talla_id, $producto) - cantidad_agregada($producto_id, $color_id, $talla_id);
}

function descontarCantidad($item,$producto)
{
    // $producto = Producto::find($item->id);
    $cantidad_disponible = cantidad_disponible($item->id, $item->options->color_id, $item->options->talla_id, $producto);
    if ($item->options->talla_id) {
        $talla = Talla::find($item->options->talla_id);
        $talla->colores()->updateExistingPivot($item->options->color_id, [
            'cantidad' => $cantidad_disponible,
        ]);
    } elseif ($item->options->color_id) {
        $producto->colores()->updateExistingPivot($item->options->color_id, [
            'cantidad' => $cantidad_disponible,
        ]);
    } else {
        $producto->cantidad = $cantidad_disponible;
        $producto->save();
    }
}

function cantidad_disponible_incrementar($item,$producto_id, $color_id = null, $talla_id = null)
{
    return cantidad($producto_id, $color_id, $talla_id) + $item->qty;
}


function incrementarCantidad($item)
{
    $producto = Producto::find($item->id);
    $cantidad_disponible = cantidad_disponible_incrementar($item,$item->id, $item->options->color_id, $item->options->talla_id);
    if ($item->options->talla_id) {
        $talla = Talla::find($item->options->talla_id);
        $talla->colores()->updateExistingPivot($item->options->color_id, [
            'cantidad' => $cantidad_disponible,
        ]);
    } elseif ($item->options->color_id) {
        $producto->colores()->updateExistingPivot($item->options->color_id, [
            'cantidad' => $cantidad_disponible,
        ]);
    } else {
        $producto->cantidad = $cantidad_disponible;
        $producto->save();
    }
}

function productos($sort_by, $nombre, $grid, $estado, $categoria_id = null, $descuento = false, $tienda_id = null)
{
    if(!$categoria_id){
        if (!$descuento){
            if(!$tienda_id){
                $productos = Producto::query()->with($grid == 'grid' ? ['imagenes'] : ['categoria', 'tienda', 'imagenes'])->whereRelation('categoria', 'deleted_at', null)->whereRelation('tienda', 'deleted_at', null)->whereRelation('tienda', 'estado', '1')->where('publicacion', 2);
            }else{
                $productos = Producto::query()->with($grid == 'grid' ? ['imagenes'] : ['categoria', 'tienda', 'imagenes'])->whereRelation('categoria', 'deleted_at', null)->whereRelation('tienda', 'deleted_at', null)->whereRelation('tienda', 'estado', '1')->where('publicacion', 2)->where('tienda_id', $tienda_id);
            }
        }
        else{
            if(!$tienda_id){
                $productos = Producto::query()->with($grid == 'grid' ? ['imagenes'] : ['categoria', 'tienda', 'imagenes'])->whereRelation('categoria', 'deleted_at', null)->whereRelation('tienda', 'deleted_at', null)->whereRelation('tienda', 'estado', '1')->where('publicacion', 2)->where('descuento', '>', 0);
            }else{
                $productos = Producto::query()->with($grid == 'grid' ? ['imagenes'] : ['categoria', 'tienda', 'imagenes'])->whereRelation('categoria', 'deleted_at', null)->whereRelation('tienda', 'deleted_at', null)->whereRelation('tienda', 'estado', '1')->where('publicacion', 2)->where('descuento', '>', 0)->where('tienda_id', $tienda_id);
            }
        }
    }else{
        if (!$descuento){
            if(!$tienda_id){
                $productos = Producto::query()->with($grid == 'grid' ? ['imagenes'] : ['categoria', 'tienda', 'imagenes'])->whereRelation('categoria', 'deleted_at', null)->whereRelation('tienda', 'deleted_at', null)->whereRelation('tienda', 'estado', '1')->where('publicacion', 2)->where('categoria_id', $categoria_id);
            }else{
                $productos = Producto::query()->with($grid == 'grid' ? ['imagenes'] : ['categoria', 'tienda', 'imagenes'])->whereRelation('categoria', 'deleted_at', null)->whereRelation('tienda', 'deleted_at', null)->whereRelation('tienda', 'estado', '1')->where('publicacion', 2)->where('categoria_id', $categoria_id)->where('tienda_id', $tienda_id);
            }
        }
        else{
            if(!$tienda_id){
                $productos = Producto::query()->with($grid == 'grid' ? ['imagenes'] : ['categoria', 'tienda', 'imagenes'])->whereRelation('categoria', 'deleted_at', null)->whereRelation('tienda', 'deleted_at', null)->whereRelation('tienda', 'estado', '1')->where('publicacion', 2)->where('categoria_id', $categoria_id)->where('descuento', '>', 0);
            }else{
                $productos = Producto::query()->with($grid == 'grid' ? ['imagenes'] : ['categoria', 'tienda', 'imagenes'])->whereRelation('categoria', 'deleted_at', null)->whereRelation('tienda', 'deleted_at', null)->whereRelation('tienda', 'estado', '1')->where('publicacion', 2)->where('categoria_id', $categoria_id)->where('descuento', '>', 0)->where('tienda_id', $tienda_id);
            }
        }
    }
    switch ($sort_by) {
        case '':
            if ($nombre != '') {
                if ($estado == 'todos') {
                    $productos = $productos->where('nombre', 'LIKE', "%" . $nombre . "%")->orderBy('nombre', 'asc')->paginate(20);
                } else {
                    $productos = $productos->where('estado', $estado)->where('nombre', 'LIKE', "%" . $nombre . "%")->orderBy('nombre', 'asc')->paginate(20);
                }
            } else {
                if ($estado == 'todos') {
                    $productos = $productos->orderBy('nombre', 'asc')->paginate(20);
                } else {
                    $productos = $productos->where('estado', $estado)->orderBy('nombre', 'asc')->paginate(20);
                }
            }
            break;
        case 'nombre_asc':
            if ($nombre != '') {
                if ($estado == 'todos') {
                    $productos = $productos->where('nombre', 'LIKE', "%" . $nombre . "%")->orderBy('nombre', 'asc')->paginate(20);
                } else {
                    $productos = $productos->where('estado', $estado)->where('nombre', 'LIKE', "%" . $nombre . "%")->orderBy('nombre', 'asc')->paginate(20);
                }
            } else {
                if ($estado == 'todos') {
                    $productos = $productos->orderBy('nombre', 'asc')->paginate(20);
                } else {
                    $productos = $productos->where('estado', $estado)->orderBy('nombre', 'asc')->paginate(20);
                }
            }
            break;
        case 'nombre_desc':
            if ($nombre != '') {
                if ($estado == 'todos') {
                    $productos = $productos->where('nombre', 'LIKE', "%" . $nombre . "%")->orderBy('nombre', 'desc')->paginate(20);
                } else {
                    $productos = $productos->where('estado', $estado)->where('nombre', 'LIKE', "%" . $nombre . "%")->orderBy('nombre', 'desc')->paginate(20);
                }
            } else {
                if ($estado == 'todos') {
                    $productos = $productos->orderBy('nombre', 'desc')->paginate(20);
                } else {
                    $productos = $productos->where('estado', $estado)->orderBy('nombre', 'desc')->paginate(20);
                }
            }
            break;
        case 'precio_asc':
            if ($nombre != '') {
                if ($estado == 'todos') {
                    $productos = $productos->where('nombre', 'LIKE', "%" . $nombre . "%")->orderBy(DB::raw('(precio - (precio*descuento))'), 'asc')->paginate(20);
                } else {
                    $productos = $productos->where('estado', $estado)->where('nombre', 'LIKE', "%" . $nombre . "%")->orderBy(DB::raw('(precio - (precio*descuento))'), 'asc')->paginate(20);
                }
            } else {
                if ($estado == 'todos') {
                    $productos = $productos->orderBy(DB::raw('(precio - (precio*descuento))'), 'asc')->paginate(20);
                } else {
                    $productos = $productos->where('estado', $estado)->orderBy(DB::raw('(precio - (precio*descuento))'), 'asc')->paginate(20);
                }
            }
            break;
        case 'precio_desc':
            if ($nombre != '') {
                if ($estado == 'todos') {
                    $productos = $productos->where('nombre', 'LIKE', "%" . $nombre . "%")->orderBy(DB::raw('(precio - (precio*descuento))'), 'desc')->paginate(20);
                } else {
                    $productos = $productos->where('estado', $estado)->where('nombre', 'LIKE', "%" . $nombre . "%")->orderBy(DB::raw('(precio - (precio*descuento))'), 'desc')->paginate(20);
                }
            } else {
                if ($estado == 'todos') {
                    $productos = $productos->orderBy(DB::raw('(precio - (precio*descuento))'), 'desc')->paginate(20);
                } else {
                    $productos = $productos->where('estado', $estado)->orderBy(DB::raw('(precio - (precio*descuento))'), 'desc')->paginate(20);
                }
            }
            break;
        case 'mas_reciente':
            if ($nombre != '') {
                if ($estado == 'todos') {
                    $productos = $productos->where('nombre', 'LIKE', "%" . $nombre . "%")->orderBy('created_at', 'desc')->paginate(20);
                } else {
                    $productos = $productos->where('estado', $estado)->where('nombre', 'LIKE', "%" . $nombre . "%")->orderBy('created_at', 'desc')->paginate(20);
                }
            } else {
                if ($estado == 'todos') {
                    $productos = $productos->orderBy('created_at', 'desc')->paginate(20);
                } else {
                    $productos = $productos->where('estado', $estado)->orderBy('created_at', 'desc')->paginate(20);
                }
            }
            break;
        case 'menos_recientes':
            if ($nombre != '') {
                if ($estado == 'todos') {
                    $productos = $productos->where('nombre', 'LIKE', "%" . $nombre . "%")->orderBy('created_at', 'asc')->paginate(20);
                } else {
                    $productos = $productos->where('estado', $estado)->where('nombre', 'LIKE', "%" . $nombre . "%")->orderBy('created_at', 'asc')->paginate(20);
                }
            } else {
                if ($estado == 'todos') {
                    $productos = $productos->orderBy('created_at', 'asc')->paginate(20);
                } else {
                    $productos = $productos->where('estado', $estado)->orderBy('created_at', 'asc')->paginate(20);
                }
            }
            break;
        default:
            $productos = [];
    }
    return $productos;
}

function productosTienda($sort_by, $grid, $tienda)
{
    switch ($sort_by) {
        case '':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria', 'tienda', 'imagenes'])->whereRelation('categoria', 'deleted_at', null)->whereRelation('tienda', 'deleted_at', null)->whereRelation('tienda', 'estado', '1')->where('publicacion', 2)->where('tienda_id', $tienda)->orderBy('nombre', 'asc')->paginate(20);
            break;
        case 'nombre_asc':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria', 'tienda', 'imagenes'])->whereRelation('categoria', 'deleted_at', null)->whereRelation('tienda', 'deleted_at', null)->whereRelation('tienda', 'estado', '1')->where('publicacion', 2)->where('tienda_id', $tienda)->orderBy('nombre', 'asc')->paginate(20);
            break;
        case 'nombre_desc':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria', 'tienda', 'imagenes'])->whereRelation('categoria', 'deleted_at', null)->whereRelation('tienda', 'deleted_at', null)->whereRelation('tienda', 'estado', '1')->where('publicacion', 2)->where('tienda_id', $tienda)->orderBy('nombre', 'desc')->paginate(20);
            break;
        case 'precio_asc':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria', 'tienda', 'imagenes'])->whereRelation('categoria', 'deleted_at', null)->whereRelation('tienda', 'deleted_at', null)->whereRelation('tienda', 'estado', '1')->where('publicacion', 2)->where('tienda_id', $tienda)->orderBy(DB::raw('(precio - (precio*descuento))'), 'asc')->paginate(20);
            break;
        case 'precio_desc':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria', 'tienda', 'imagenes'])->whereRelation('categoria', 'deleted_at', null)->whereRelation('tienda', 'deleted_at', null)->whereRelation('tienda', 'estado', '1')->where('publicacion', 2)->where('tienda_id', $tienda)->orderBy(DB::raw('(precio - (precio*descuento))'), 'desc')->paginate(20);
            break;
        case 'mas_reciente':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria', 'tienda', 'imagenes'])->whereRelation('categoria', 'deleted_at', null)->whereRelation('tienda', 'deleted_at', null)->whereRelation('tienda', 'estado', '1')->where('publicacion', 2)->where('tienda_id', $tienda)->orderBy('created_at', 'desc')->paginate(20);
            break;
        case 'menos_recientes':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria', 'tienda', 'imagenes'])->whereRelation('categoria', 'deleted_at', null)->whereRelation('tienda', 'deleted_at', null)->whereRelation('tienda', 'estado', '1')->where('publicacion', 2)->where('tienda_id', $tienda)->orderBy('created_at', 'asc')->paginate(20);
            break;
        default:
            $productos = [];
    }
    return $productos;
}

function categoriaProductosTienda($sort_by, $grid, $tienda, $categoria_id)
{
    switch ($sort_by) {
        case '':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria', 'tienda', 'imagenes'])->whereRelation('categoria', 'deleted_at', null)->whereRelation('tienda', 'deleted_at', null)->whereRelation('tienda', 'estado', '1')->where('publicacion', 2)->where('tienda_id', $tienda)->where('categoria_id', $categoria_id)->orderBy('nombre', 'asc')->paginate(20);
            break;
        case 'nombre_asc':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria', 'tienda', 'imagenes'])->whereRelation('categoria', 'deleted_at', null)->whereRelation('tienda', 'deleted_at', null)->whereRelation('tienda', 'estado', '1')->where('publicacion', 2)->where('tienda_id', $tienda)->where('categoria_id', $categoria_id)->orderBy('nombre', 'asc')->paginate(20);
            break;
        case 'nombre_desc':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria', 'tienda', 'imagenes'])->whereRelation('categoria', 'deleted_at', null)->whereRelation('tienda', 'deleted_at', null)->whereRelation('tienda', 'estado', '1')->where('publicacion', 2)->where('tienda_id', $tienda)->where('categoria_id', $categoria_id)->orderBy('nombre', 'desc')->paginate(20);
            break;
        case 'precio_asc':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria', 'tienda', 'imagenes'])->whereRelation('categoria', 'deleted_at', null)->whereRelation('tienda', 'deleted_at', null)->whereRelation('tienda', 'estado', '1')->where('publicacion', 2)->where('tienda_id', $tienda)->where('categoria_id', $categoria_id)->orderBy(DB::raw('(precio - (precio*descuento))'), 'asc')->paginate(20);
            break;
        case 'precio_desc':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria', 'tienda', 'imagenes'])->whereRelation('categoria', 'deleted_at', null)->whereRelation('tienda', 'deleted_at', null)->whereRelation('tienda', 'estado', '1')->where('publicacion', 2)->where('tienda_id', $tienda)->where('categoria_id', $categoria_id)->orderBy(DB::raw('(precio - (precio*descuento))'), 'desc')->paginate(20);
            break;
        case 'mas_reciente':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria', 'tienda', 'imagenes'])->whereRelation('categoria', 'deleted_at', null)->whereRelation('tienda', 'deleted_at', null)->whereRelation('tienda', 'estado', '1')->where('publicacion', 2)->where('tienda_id', $tienda)->where('categoria_id', $categoria_id)->orderBy('created_at', 'desc')->paginate(20);
            break;
        case 'menos_recientes':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria', 'tienda', 'imagenes'])->whereRelation('categoria', 'deleted_at', null)->whereRelation('tienda', 'deleted_at', null)->whereRelation('tienda', 'estado', '1')->where('publicacion', 2)->where('tienda_id', $tienda)->where('categoria_id', $categoria_id)->orderBy('created_at', 'asc')->paginate(20);
            break;
        default:
            $productos = [];
    }
    return $productos;
}


function datosD($busqueda, $fecha)
{
    $cont = 0;
    $dias = array();
    $ingresos = array();
    for ($i = 0; $i < $fecha; $i++) {
        array_push($dias, ($i + 1));
        if ($cont < count($busqueda)) {
            if (($i + 1) == $busqueda[$cont]->dia) {
                array_push($ingresos, $busqueda[$cont]->total);
                $cont = $cont + 1;
            } else {
                array_push($ingresos, 0);
            }
        } else {
            array_push($ingresos, 0);
        }
    }
    return [$dias, $ingresos];
}

function datosM($busqueda)
{
    $cont = 0;
    // $meses = array();
    $ingresos = array();
    for ($i = 0; $i < 12; $i++) {
        // array_push($meses, ($i + 1));
        if ($cont < count($busqueda)) {
            if (($i + 1) == $busqueda[$cont]->mes) {
                array_push($ingresos, $busqueda[$cont]->total);
                $cont = $cont + 1;
            } else {
                array_push($ingresos, 0);
            }
        } else {
            array_push($ingresos, 0);
        }
    }
    return $ingresos;
}
