<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TallaColorProducto extends Model
{
    use HasFactory;
    protected $table = 'talla_color_productos';

    /**
     * Relaciones
     */
    public function tienda()
    {
        return $this->belongsTo(Tienda::class,'tienda_id','id');
    }
}
