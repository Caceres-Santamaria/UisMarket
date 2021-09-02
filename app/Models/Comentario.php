<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    protected $table = 'comentarios';

    /**
     * Relaciones
     */
    public function tienda()
    {
        return $this->belongsTo(Pedido::class,'pedido_id','id');
    }

}
