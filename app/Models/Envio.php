<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Envio extends Pivot
{
    use HasFactory;
    protected $table = 'envios';
    protected $primaryKey = 'id';
    public $incrementing = true;

    /**
     * Los atributos que se pueden asignar masivamente
     *
     * @var array
     */
    protected $fillable = ['costo','ciudad_id','tienda_id'];
}
