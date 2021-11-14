<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
// use Illuminate\Database\Eloquent\SoftDeletes;

class ColorTalla extends Pivot
{
    use HasFactory;
    protected $table = 'color_tallas';
    public $incrementing = true;

    /**
     * Los atributos que se pueden asignar masivamente
     *
     * @var array
     */
    protected $fillable = ['talla_id','color_id','cantidad'];
}
