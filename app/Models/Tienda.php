<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Tienda extends Model
{
    use Searchable;
    use HasFactory, SoftDeletes;
    protected $table = 'tiendas';
    const PENDIENTE = 0;
    const VALIDADA = 1;
    const SUSPENDIDA = 2;
    const RECHAZADA = 3;
    /**
     * Los descriptores de acceso que se agregarán a la forma de matriz del modelo.
     *
     * @var array
     */
    // protected $appends = ['calificacion'];

    /**
     * Los valores predeterminados del modelo para los atributos.
     *
     * @var array
     */
    protected $attributes = [
        'recoger_tienda' => 0,
        'recoger_uis' => 0,
    ];

    /**
     * Los atributos que no se pueden asignar masivamente.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Relaciones
     */

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

    // public function getCantidadAttribute()
    // {
    //     return $this->calificaciones->count();
    // }

    /**
     * Retorna un array de dos posiciones en la primera la calificación y en la segunda
     * el número de calificaciones que se le han hecho a la tienda
     */
    public function getCalificacionAttribute()
    {
        $calificaciones = $this->calificaciones;
        $cantidad = count($calificaciones);
        if ($cantidad > 0) {
            $suma = 0;
            foreach ($calificaciones as $calificacion) {
                $suma += $calificacion->calificacion;
            }
            return [$suma / $cantidad, $cantidad];
        } else {
            return [0, 0];
        }
    }

    /**
     * Obtiene todos los pedidos despachados por la tienda
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
     * Obtiene la ciudad a la que pertenece la tienda
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
     * Obtiene los envíos que pertenecen a una tienda
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
            ->as('envio')
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

    // public function searchableAs()
    // {
    //     return 'tiendas';
    // }
}
