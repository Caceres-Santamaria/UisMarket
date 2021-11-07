<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'categorias';

    /**
     * Los atributos que no se pueden asignar masivamente
     *
     * @var array
     */
    protected $guarded = ['id','created_at','updated_at'];

    /**
     * Relaciones
     */

    /**
     * Obtiene todos los productos que pertenecen a una categoría
     */
    public function productos(){
        return $this->hasMany(
            Producto::class, // Modelo que queremos traer
            'categoria_id', // Foreign key en la tabla productos
            'id' // owner_key en la tabla categorias
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
