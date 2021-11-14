<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenProducto extends Model
{
    use HasFactory;
    protected $table = 'imagen_productos';

    /**
     * Los atributos que se pueden asignar masivamente
     *
     * @var array
     */
    protected $fillable = ['url','prioridad','imagen_tabla_id','imagen_tabla_tipo'];

    /**
     * Relaciones
     */

    /**
      * Obtiene el modelo imageable de los padres (Producto)
      */
    public function imageable()
    {
        return $this->morphTo();
    }
}
