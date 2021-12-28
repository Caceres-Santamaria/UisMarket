<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Producto extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'productos';

    const BORRADOR = 1;
    const PUBLICADO = 2;

    // protected $with = ['imagenes'];

    /**
     * Los valores predeterminados del modelo para los atributos.
     *
     * @var array
     */
    protected $attributes = [
        'publicacion' => 1,
    ];

    /**
     * Los atributos que se pueden asignar masivamente
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'slug',
        'descripcion',
        'precio',
        'categoria_id',
        'id_tienda',
        'estado',
        'publicacion',
        'cantidad'
    ];

    public function getStockAttribute(){
        if ($this->talla) {
            return  ColorTalla::whereHas('talla.producto', function(Builder $query){
                        $query->where('id', $this->id);
                    })->sum('cantidad');
        } elseif($this->color) {
            return  ColorProducto::whereHas('producto', function(Builder $query){
                        $query->where('id', $this->id);
                    })->sum('cantidad');
        }else{
            return $this->cantidad;
        }
    }

    /**
     * Relaciones
     */

    /**
     * Obtiene la categoría a la que pertenece el producto
     */
    public function categoria(){
        return $this->belongsTo(
            Categoria::class,
            'categoria_id',
            'id'
        );
    }

    /**
     * Obtiene los productos con color
     */
    public function colores()
    {
        return $this->belongsToMany(
            Color::class,
            'color_productos',
            'producto_id',
            'color_id'
        )
                    ->using(ColorProducto::class)
                    ->as('pColor')
                    ->withPivot('cantidad')
                    ->withTimestamps();
    }

    /**
     * Obtiene las tallas de un producto
     */
    public function tallas()
    {
        return $this->hasMany(
            Talla::class,
            'producto_id',
            'id'
        );
    }

    /**
     * Obtiene todas las imágenes de un producto
     */
    public function imagenes(){
        return $this->morphMany(
            ImagenProducto::class,
            'imagen_tabla'
        );
    }

    /**
     * Obtiene la tienda a la que pertenece un producto
     */
    public function tienda()
    {
        return $this->belongsTo(
            Tienda::class,
            'tienda_id',
            'id'
        );
    }

    /**
     * Obtiene todas los colores tallas del producto
     */
    public function colorTallas()
    {
        return $this->hasManyThrough(
            ColorTalla::class,
            Talla::class,
            'producto_id',
            'talla_id',
            'id',
            'id'
        );
    }

    /**
     * Se utiliza el Slug como URL amigable
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
