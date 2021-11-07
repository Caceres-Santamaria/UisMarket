<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
// use Illuminate\Database\Eloquent\SoftDeletes;

class ColorProducto extends Pivot
{
    use HasFactory;
    protected $table = 'color_productos';
    public $incrementing = true;

    /**
     * Los atributos que se pueden asignar masivamente
     *
     * @var array
     */
    protected $fillable = ['producto_id','color_id','cantidad'];
}
