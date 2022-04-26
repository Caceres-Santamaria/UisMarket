<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ciudad extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'ciudades';

    /**
     * Los atributos que se pueden asignar masivamente
     *
     * @var array
     */
    protected $fillable = ['nombre', 'id_departamento', 'slug'];

    /**
     * Relaciones
     */

    /**
     * Obtiene todas las tiendas de una ciudad
     */
    public function tiendas()
    {
        return $this->hasMany(
            Tienda::class, // Modelo que queremos traer
            'ciudad_id', // Foreign key en la tabla tiendas
            'id' // owner_key en la tabla ciudades
        );
    }

    /**
     * Obtiene todas las direcciones de una ciudad
     */
    public function direcciones()
    {
        return $this->hasMany(
            Direccion::class, // Modelo que queremos traer
            'ciudad_id', // Foreign key en la tabla direcciones
            'id' // owner_key en la tabla ciudades
        );
    }

    /**
     * Obtiene todos los pedidos de una ciudad
     */
    public function pedidos()
    {
        return $this->hasMany(
            Pedido::class,
            'ciudad_id',
            'id'
        );
    }

    /**
     * Obtiene el departamento al que pertenece la ciudad
     */
    public function departamento()
    {
        return $this->belongsTo(
            Departamento::class,
            'departamento_id',
            'id'
        );
    }

    /**
     * Obtiene los envios que pertenecen a una ciudad
     */
    public function envios()
    {
        return $this->belongsToMany(
            Tienda::class,
            'envios',
            'ciudad_id',
            'tienda_id'
        )
            ->using(Envio::class)
            ->as('envio')
            ->withPivot('costo')
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
