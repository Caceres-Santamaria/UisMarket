<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;
    protected $table = 'calificaciones';
    
    /**
     * Relaciones
     */
    public function pedido()
    {
        return $this->belongsTo(Pedido::class,'pedido_id','id');
    }
}
