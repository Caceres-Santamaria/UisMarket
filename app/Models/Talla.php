<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Talla extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tallas';


    /**
     * Los atributos que se pueden asignar masivamente
     *
     * @var array
     */
    protected $fillable = ['nombre','producto_id'];

    /**
     * Relaciones
     */

    /**
     * Obtiene el producto al que pertenece una talla
     */
    public function producto()
    {
        return $this->belongsTo(
            Producto::class,
            'producto_id',
            'id'
        );
    }

    /**
     * Obtiene las tallas con color
     */
    public function colores(){
        return $this->belongsToMany(
            Color::class,
            'color_tallas',
            'talla_id',
            'color_id'
        )
                    ->using(ColorTalla::class)
                    ->as('pTalla')
                    ->withPivot('cantidad','id')
                    ->withTimestamps();
    }

    public function getStockAttribute(){
        return $this->colores()->sum('cantidad');
    }
}
