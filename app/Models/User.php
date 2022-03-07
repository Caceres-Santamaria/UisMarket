<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use SoftDeletes;
    use HasProfilePhoto;
    use TwoFactorAuthenticatable;

    const SUPERADMINISTRADOR = 0;
    const ADMINISTRADOR = 1;
    const EMPRENDEDOR = 2;
    const COMPRADOR = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'ciudad_id',
        'rol'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    /**
     * Relaciones
     */

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
    public function tienda()
    {
        return $this->hasOne(
            Tienda::class,
            'user_id',
            'id'
        );
    }
}
