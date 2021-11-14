<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;
    protected $table = 'direcciones';

    /**
     * Los atributos que se pueden asignar masivamente
     *
     * @var array
     */
    protected $fillable = [
        'contacto',
        'telefono',
        'direccion',
        'especificacion',
        'ciudad_id',
        'codigo_postal',
        'predeterminado',
        'usuario_id'
    ];

    /**
     * Relaciones
     */

    /**
      * Obtiene el usuario al que pertenece una dirección
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
     * Obtiene la ciudad a la que pertenece la dirección
     */
    public function ciudad()
    {
        return $this->belongsTo(
            Ciudad::class,
            'ciudad_id',
            'id'
        );
    }

}
