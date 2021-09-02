<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;
    protected $table = 'ciudades';

    /**
     * Relaciones
     */
    public function tiendas()
    {
      return $this->hasMany(Tienda::class,'ciudad_id','id');
    }

    public function tiendasD()
    {
      return $this->belongsToMany(Tienda::class,'ciudad_tiendas','ciudad_id','tienda_id')
                  ->using(CiudadTienda::class)
                  ->as('domicilios')
                  ->withPivot('costo')
                  ->withTimestamps();

    }
}
