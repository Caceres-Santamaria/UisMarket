<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $table = 'pedidos';

    /**
     * Relaciones
     */
    public function calificacion()
    {
      return $this->hasOne(Calificacion::class,'pedido_id','id');
    }

    public function comentario()
    {
      return $this->hasOne(Comentario::class,'pedido_id','id');
    }
}
