<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;
    const ADMINISTRADOR = 1;
    const EMPRENDEDOR = 2;
    const COMPRADOR = 3;

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'rol' => 3,
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'ciudad_id',
        'slug'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relaciones
     */

    /**
     * Obtiene todos los comentarios hechos por el usuario
     */
    public function comentarios()
    {
        return $this->hasManyThrough(
            Comentario::class,
            Pedido::class,
            'usuario_id',
            'pedido_id',
            'id',
            'id'
        );
    }

    /**
     * Obtiene todas las calificaciones hechas por el usuario
     */
    public function calificaciones()
    {
        return $this->hasManyThrough(
            Calificacion::class, //Modelo que se quiere traer
            Pedido::class, // Modelo a través del que se obtiene la relación
            'usuario_id', // Foreign key en la tabla pedidos
            'pedido_id', // Foreign key en la tabla calificaciones
            'id', // Local key en la tabla users
            'id' // Local key en la tabla pedidos
        );
    }

    /**
     * Obtiene todos los pedidos de un usuario
     */
    public function pedidos()
    {
        return $this->hasMany(
            Pedido::class,
            'usuario_id',
            'id'
        );
    }

    /**
     * Obtiene la ciudad a la que pertenece el usuario
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
      * Obtiene las direcciones de un usuario
      */
    public function direcciones()
    {
        return $this->hasMany(
            Direccion::class,
            'usuario_id',
            'id'
        );
    }

    /**
     * Obtiene la tienda de un usuario
     */
    public function usuario()
    {
        return $this->hasOne(
            Tienda::class,
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
