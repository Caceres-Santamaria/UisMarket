<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;
    protected $table = 'calificaciones';

    /**
     * Los atributos que se pueden asignar masivamente
     *
     * @var array
     */
protected $fillable = ['calificacion','pedido_id'];

    /**
     * Relaciones
     */

    /**
     * Obtiene el pedido propietaria de una calificación
     */
    public function pedido()
    {
        return $this->belongsTo(
            Pedido::class,
            'pedido_id',
            'id'
        );
    }
}
