<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
  use HasFactory, SoftDeletes;
    protected $table = 'pedidos';
    const PENDIENTE = 1;
    const RECIBIDO = 2;
    const ENVIADO = 3;
    const ENTREGADO = 4;
    const ANULADO = 5;

    /**
     * Los valores predeterminados del modelo para los atributos.
     *
     * @var array
     */
    protected $attributes = [
      'estado' => 1,
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
     * Obtiene la calificación de un pedido
     */
    public function calificacion()
    {
      return $this->hasOne(
        Calificacion::class,
        'pedido_id',
        'id'
      );
    }

    /**
     * Obtiene la ciudad a la que se envió el pedido
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
     * Obtiene el usuario que hizo el pedido
     */
    public function usuario()
    {
      return $this->belongsTo(
        User::class,
        'usuario_id',
        'id'
      );
    }

    /**
     * Obtiene la tienda que despachó el pedido
     */
    public function tienda()
    {
      return $this->belongsTo(
        Tienda::class,
        'tienda_id',
        'id'
      );
    }
}
