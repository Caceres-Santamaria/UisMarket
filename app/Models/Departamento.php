<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departamento extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'departamentos';
    /**
     * Los atributos que se pueden asignar masivamente
     *
     * @var array
     */
    protected $fillable = ['nombre', 'slug'];

    /**
     * Obtiene todas las ciudades de un departamento
     */
    public function ciudades()
    {
        return $this->hasMany(
            Ciudad::class,
            'departamento_id',
            'id'
        );
    }

    /**
     * Se utiliza el Slug como URL amigable
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
