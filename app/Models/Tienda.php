<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tienda extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tiendas';

    /**
     * Los valores predeterminados del modelo para los atributos.
     *
     * @var array
     */
    protected $attributes = [
      'recoger_tienda' => 0,
    ];

    /**
     * Los atributos que no se pueden asignar masivamente.
      *
      * @var array
      */
      protected $guarded = ['id','created_at','updated_at'];

    /**
     * Relaciones
     */

    /**
     * Obtiene todos los comentarios de la tienda
     */
    public function comentarios()
    {
        return $this->hasManyThrough(
          Comentario::class,
          Pedido::class,
          'tienda_id',
          'pedido_id',
          'id',
          'id'
        );
    }

    /**
     * Obtiene todas las calificaciones de la tienda
     */
    public function calificaciones()
    {
        return $this->hasManyThrough(
          Calificacion::class,
          Pedido::class,
          'tienda_id',
          'pedido_id',
          'id',
          'id'
        );
    }

    /**
     * Obtiene todos los pedidos despachados por un tienda
     */
    public function pedidos()
    {
      return $this->hasMany(
        Pedido::class,
        'tienda_id',
        'id'
      );
    }

    /**
     * Obtienela ciudad a la que pertenece la tienda
     */
    public function ciudad()
    {
      return $this->belongsTo(
        Ciudad::class,
        'ciudad_id',
        'id'
      );
    }

    /**
     * Obtiene los envios que pertenecen a una tienda
     */
    public function envios()
    {
      return $this->belongsToMany(
        Ciudad::class,
        'envios',
        'tienda_id',
        'ciudad_id'
        )
                  ->using(Envio::class)
                  ->as('envios')
                  ->withPivot('costo')
                  ->withTimestamps();
    }

    /**
     * Obtiene todos los productos de una tienda
     */
    public function productos()
    {
        return $this->hasMany(
            Producto::class,
            'tienda_id',
            'id'
        );
    }

    /**
     * Obtiene el usuario al que pertenece la tienda
     */
    public function usuario()
    {
      return $this->belongsTo(
        User::class,
        'user_id',
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

