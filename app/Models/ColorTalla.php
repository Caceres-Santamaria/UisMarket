<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\Pivot;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Concerns\AsPivot;

class ColorTalla extends Model
{
    use AsPivot;
    use HasFactory;
    protected $table = 'color_tallas';
    public $incrementing = true;

    /**
     * Los atributos que se pueden asignar masivamente
     *
     * @var array
     */
    protected $fillable = ['talla_id','color_id','cantidad'];

    /**
     * Relaciones
     */

    public function color(){
        return $this->belongsTo(Color::class);
    }

    public function talla(){
        return $this->belongsTo(Talla::class);
    }
}
