<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    protected $table = 'comentarios';

    /**
     * Los atributos que se pueden asignar masivamente
     *
     * @var array
     */
    protected $fillable = ['contenido','pedido_id','usuario_id'];

    /**
     * Relaciones
     */

    /**
     * Obtiene el pedido al que pertenece un comentario
     */
    public function pedido()
    {
        return $this->belongsTo(
            Pedido::class, // Modelo que queremos traer
            'pedido_id', // Foreign key en la tabla comentarios
            'id' // owner_key en la tabla pedidos
        );
    }
}
