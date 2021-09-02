<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Ciudad_tienda extends Pivot
{
    use HasFactory;
    protected $table = 'ciudad_tiendas';
    protected $primaryKey = 'id';
    public $incrementing = true;
    /**
     * Relaciones
     */
}
