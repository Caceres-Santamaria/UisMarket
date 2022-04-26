<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'colores';

    /**
     * Los atributos que se pueden asignar masivamente
     *
     * @var array
     */
    protected $fillable = ['nombre', 'slug'];

    /**
     * Relaciones
     */

    /**
     * Obtiene los productos con color
     */
    public function productos()
    {
        return $this->belongsToMany(
            Producto::class,
            'color_productos',
            'color_id',
            'producto_id'
        )
                    ->using(ColorProducto::class)
                    ->withPivot('cantidad')
                    ->withTimestamps();
    }

    /**
     * Obtiene las tallas con color
     */
    public function tallas(){
        return $this->belongsToMany(
            Talla::class,
            'color_tallas',
            'color_id',
            'talla_id'
        )
                    ->using(ColorTalla::class)
                    ->withPivot('cantidad')
                    ->withTimestamps();
    }

    /**
     * Se utiliza el Slug como URL amigable
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
