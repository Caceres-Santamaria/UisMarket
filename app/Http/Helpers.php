<?php

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Talla;
use Illuminate\Support\Facades\Storage;
use Gloudemans\Shoppingcart\Facades\Cart;

/**
 * comprueba que la sesion de categoria esté creada
 * si no está creada, se crean.
 */
function comprobarCategoria(){
    if(!request()->session()->has('categorias')){
    $categorias = Categoria::orderBy('nombre', 'asc')->get();
    session(['categorias' => $categorias]);
    }
}

function fondo($fondo_img)
{
    if($fondo_img)
    {
        $url = Storage::url($fondo_img);
        return "background-image:url('$url')";
    }
    else
    {
        return "background-color:rgb(186, 189, 194)";
    }
}

function splide($imagenProductos){
    if ($imagenProductos == 1){
        return 'false';
    }
    else{
        return 'true';
    }
}

function slugToName($slug){
    $numeros = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
    $nombre = str_replace($numeros,"",$slug);
    return str_replace("-"," ",$nombre);
}

function stock($cantidad){
    return ($cantidad <= 0) ? 'sin-stock' : 'con-stock';
}

function sortByActive($sort_by){
    return (request()->sort_by == $sort_by) ? 'bg-gray-300' : '';
}

function setActive($route){
    return request()->routeIs($route) ? 'border-white' : '';
}

function setActiveAdmin($route){
  return request()->routeIs($route) ? 'text-primario-n hover:text-primario-dark2' : '';
}

function cantidad($producto_id, $color_id = null, $talla_id = null){
    $producto = Producto::find($producto_id);

    if($talla_id){
        $talla = Talla::find($talla_id);
        $cantidad = $talla->colores->find($color_id)->pTalla->cantidad;
    }elseif($color_id){
        $cantidad = $producto->colores->find($color_id)->pColor->cantidad;
    }else{
        $cantidad = $producto->cantidad;
    }
    return $cantidad;
}

function cantidad_agregada($producto_id, $color_id = null, $talla_id = null){

    $cart = Cart::content();

    $item = $cart->where('id', $producto_id)
                ->where('options.color_id', $color_id)
                ->where('options.talla_id', $talla_id)
                ->first();

    if($item){
        return $item->qty;
    }else{
        return 0;
    }

}

function cantidad_disponible($producto_id, $color_id = null, $talla_id = null){

    return cantidad($producto_id, $color_id, $talla_id) - cantidad_agregada($producto_id, $color_id, $talla_id);
}

function productos($sort_by,$nombre,$grid){
    switch ($sort_by) {
        case '':
            if ($nombre != '') {
                $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('nombre', 'LIKE', "%" . $nombre . "%")->orderBy('nombre', 'asc')->paginate(20);
            } else {
                $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->orderBy('nombre', 'asc')->paginate(20);
            }
            break;
        case 'nombre_asc':
            if ($nombre != '') {
                $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('nombre', 'LIKE', "%" . $nombre . "%")->orderBy('nombre', 'asc')->paginate(20);
            } else {
                $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->orderBy('nombre', 'asc')->paginate(20);
            }
            break;
        case 'nombre_desc':
            if ($nombre != '') {
                $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('nombre', 'LIKE', "%" . $nombre . "%")->orderBy('nombre', 'desc')->paginate(20);
            } else {
                $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->orderBy('nombre', 'desc')->paginate(20);
            }
            break;
        case 'precio_asc':
            if ($nombre != '') {
                $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('nombre', 'LIKE', "%" . $nombre . "%")->orderBy('precio', 'asc')->paginate(20);
            } else {
                $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->orderBy('precio', 'asc')->paginate(20);
            }
            break;
        case 'precio_desc':
            if ($nombre != '') {
                $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('nombre', 'LIKE', "%" . $nombre . "%")->orderBy('precio', 'desc')->paginate(20);
            } else {
                $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->orderBy('precio', 'desc')->paginate(20);
            }
            break;
        case 'mas_reciente':
            if ($nombre != '') {
                $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('nombre', 'LIKE', "%" . $nombre . "%")->orderBy('created_at', 'desc')->paginate(20);
            } else {
                $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->orderBy('created_at', 'desc')->paginate(20);
            }
            break;
        case 'menos_recientes':
            if ($nombre != '') {
                $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('nombre', 'LIKE', "%" . $nombre . "%")->orderBy('created_at', 'asc')->paginate(20);
            } else {
                $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->orderBy('created_at', 'asc')->paginate(20);
            }
            break;
        default:
            $productos = [];
    }
    return $productos;
}

function productosTienda($sort_by,$grid,$tienda){
    switch ($sort_by) {
        case '':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('tienda_id',$tienda)->orderBy('nombre', 'asc')->paginate(20);
            break;
        case 'nombre_asc':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('tienda_id',$tienda)->orderBy('nombre', 'asc')->paginate(20);
            break;
        case 'nombre_desc':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('tienda_id',$tienda)->orderBy('nombre', 'desc')->paginate(20);
            break;
        case 'precio_asc':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('tienda_id',$tienda)->orderBy('precio', 'asc')->paginate(20);
            break;
        case 'precio_desc':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('tienda_id',$tienda)->orderBy('precio', 'desc')->paginate(20);
            break;
        case 'mas_reciente':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('tienda_id',$tienda)->orderBy('created_at', 'desc')->paginate(20);
            break;
        case 'menos_recientes':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('tienda_id',$tienda)->orderBy('created_at', 'asc')->paginate(20);
            break;
        default:
            $productos = [];
    }
    return $productos;
}

function productosPromociones($sort_by,$grid){
    switch ($sort_by) {
        case '':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('descuento','>',0)->orderBy('nombre', 'asc')->paginate(20);
            break;
        case 'nombre_asc':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('descuento','>',0)->orderBy('nombre', 'asc')->paginate(20);
            break;
        case 'nombre_desc':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('descuento','>',0)->orderBy('nombre', 'desc')->paginate(20);
            break;
        case 'precio_asc':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('descuento','>',0)->orderBy('precio', 'asc')->paginate(20);
            break;
        case 'precio_desc':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('descuento','>',0)->orderBy('precio', 'desc')->paginate(20);
            break;
        case 'mas_reciente':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('descuento','>',0)->orderBy('created_at', 'desc')->paginate(20);
            break;
        case 'menos_recientes':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('descuento','>',0)->orderBy('created_at', 'asc')->paginate(20);
            break;
        default:
            $productos = [];
    }
    return $productos;
}

function categoriaProductos($sort_by,$nombre,$categoria,$grid){
    switch ($sort_by) {
        case '':
            if ($nombre != '') {
                $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('categoria_id', $categoria->id)->where('nombre', 'LIKE', "%" . $nombre . "%")->orderBy('nombre', 'asc')->paginate(20);
            } else {
                $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('categoria_id', $categoria->id)->orderBy('nombre', 'asc')->paginate(20);
            }
            break;
        case 'nombre_asc':
            if ($nombre != '') {
                $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('categoria_id', $categoria->id)->where('nombre', 'LIKE', "%" . $nombre . "%")->orderBy('nombre', 'asc')->paginate(20);
            } else {
                $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('categoria_id', $categoria->id)->orderBy('nombre', 'asc')->paginate(20);
            }
            break;
        case 'nombre_desc':
            if ($nombre != '') {
                $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('categoria_id', $categoria->id)->where('nombre', 'LIKE', "%" . $nombre . "%")->orderBy('nombre', 'desc')->paginate(20);
            } else {
                $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('categoria_id', $categoria->id)->orderBy('nombre', 'desc')->paginate(20);
            }
            break;
        case 'precio_asc':
            if ($nombre != '') {
                $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('categoria_id', $categoria->id)->where('nombre', 'LIKE', "%" . $nombre . "%")->orderBy('precio', 'asc')->paginate(20);
            } else {
                $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('categoria_id', $categoria->id)->orderBy('precio', 'asc')->paginate(20);
            }
            break;
        case 'precio_desc':
            if ($nombre != '') {
                $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('categoria_id', $categoria->id)->where('nombre', 'LIKE', "%" . $nombre . "%")->orderBy('precio', 'desc')->paginate(20);
            } else {
                $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('categoria_id', $categoria->id)->orderBy('precio', 'desc')->paginate(20);
            }
            break;
        case 'mas_reciente':
            if ($nombre != '') {
                $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('categoria_id', $categoria->id)->where('nombre', 'LIKE', "%" . $nombre . "%")->orderBy('created_at', 'desc')->paginate(20);
            } else {
                $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('categoria_id', $categoria->id)->orderBy('created_at', 'desc')->paginate(20);
            }
            break;
        case 'menos_recientes':
            if ($nombre != '') {
                $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('categoria_id', $categoria->id)->where('nombre', 'LIKE', "%" . $nombre . "%")->orderBy('created_at', 'asc')->paginate(20);
            } else {
                $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('categoria_id', $categoria->id)->orderBy('created_at', 'asc')->paginate(20);
            }
            break;
        default:
            $productos = [];
    }
    return $productos;
}

function categoriaProductosTienda($sort_by,$grid,$tienda,$categoria_id){
    switch ($sort_by) {
        case '':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('tienda_id',$tienda)->where('categoria_id', $categoria_id)->orderBy('nombre', 'asc')->paginate(20);
            break;
        case 'nombre_asc':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('tienda_id',$tienda)->where('categoria_id', $categoria_id)->orderBy('nombre', 'asc')->paginate(20);
            break;
        case 'nombre_desc':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('tienda_id',$tienda)->where('categoria_id', $categoria_id)->orderBy('nombre', 'desc')->paginate(20);
            break;
        case 'precio_asc':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('tienda_id',$tienda)->where('categoria_id', $categoria_id)->orderBy('precio', 'asc')->paginate(20);
            break;
        case 'precio_desc':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('tienda_id',$tienda)->where('categoria_id', $categoria_id)->orderBy('precio', 'desc')->paginate(20);
            break;
        case 'mas_reciente':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('tienda_id',$tienda)->where('categoria_id', $categoria_id)->orderBy('created_at', 'desc')->paginate(20);
            break;
        case 'menos_recientes':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('tienda_id',$tienda)->where('categoria_id', $categoria_id)->orderBy('created_at', 'asc')->paginate(20);
            break;
        default:
            $productos = [];
    }
    return $productos;
}

function categoriaProductosPromociones($sort_by,$categoria_id,$grid){
    switch ($sort_by) {
        case '':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('descuento','>',0)->where('categoria_id', $categoria_id)->orderBy('nombre', 'asc')->paginate(20);
            break;
        case 'nombre_asc':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('descuento','>',0)->where('categoria_id', $categoria_id)->orderBy('nombre', 'asc')->paginate(20);
            break;
        case 'nombre_desc':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('descuento','>',0)->where('categoria_id', $categoria_id)->orderBy('nombre', 'desc')->paginate(20);
            break;
        case 'precio_asc':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('descuento','>',0)->where('categoria_id', $categoria_id)->orderBy('precio', 'asc')->paginate(20);
            break;
        case 'precio_desc':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('descuento','>',0)->where('categoria_id', $categoria_id)->orderBy('precio', 'desc')->paginate(20);
            break;
        case 'mas_reciente':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('descuento','>',0)->where('categoria_id', $categoria_id)->orderBy('created_at', 'desc')->paginate(20);
            break;
        case 'menos_recientes':
            $productos = Producto::with($grid == 'grid' ? ['imagenes'] : ['categoria','tienda','imagenes'])->where('descuento','>',0)->where('categoria_id', $categoria_id)->orderBy('created_at', 'asc')->paginate(20);
            break;
        default:
            $productos = [];
    }
    return $productos;
}
