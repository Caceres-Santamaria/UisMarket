<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Scout\Searchable;
use Cviebrock\EloquentSluggable\Sluggable;

class Producto extends Model
{
    use Sluggable;
    use Searchable;
    use HasFactory, SoftDeletes;
    protected $table = 'productos';

    const BORRADOR = 1;
    const PUBLICADO = 2;
    const SUSPENDIDO = 3;

    protected $with = ['imagenes'];

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

    public function getStockAttribute()
    {
        if ($this->talla) {
            return  ColorTalla::whereHas('talla.producto', function (Builder $query) {
                $query->where('id', $this->id);
            })->sum('cantidad');
        } elseif ($this->color) {
            return  ColorProducto::whereHas('producto', function (Builder $query) {
                $query->where('id', $this->id);
            })->sum('cantidad');
        } else {
            return $this->cantidad;
        }
    }

    public function getPrioridadAttribute()
    {
        return $this->imagenes->pluck('prioridad')->max();
    }

    public function getPrecioTotalAttribute(){
        return $this->precio - ($this->precio*$this->descuento );
    }

    /**
     * Relaciones
     */

    /**
     * Obtiene la categoría a la que pertenece el producto
     */
    public function categoria()
    {
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
            ->withPivot('cantidad')
            ->withPivot('id')
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
    public function imagenes()
    {
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

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nombre'
            ]
        ];
    }

    /**
     * Get the name of the index associated with the model.
     *
     * @return string
     */
    //     public function searchableAs()
    //     {
    //         return 'productos';
    //     }

    // public function toSearchableArray()
    // {
    //     return [
    //         'id' => $this->id,
    //         'nombre' => $this->nombre,
    //         'slug' => $this->slug,
    //         'categoria_id' => $this->categoria_id,
    //         'tienda_id' => $this->tienda_id,
    //         'estado' => $this->estado,
    //     ];
    // }

    public function shouldBeSearchable()
    {
        if($this->tienda){
            return ($this->publicacion == '2' and $this->tienda->estado == '1' and $this->categoria != null);
        }
        else {
            return ($this->publicacion == '2' and $this->tienda != null and $this->categoria != null);
        }
    }
}
