<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    use HasFactory;
    protected $table = 'tiendas';

    /**
     * Relaciones
     */
    public function tallaColorProductos()
    {
      return $this->hasMany(TallaColorProducto::class,'tienda_id','id');
    }

    public function usuario()
    {
      return $this->belongsTo(User::class,'user_id','id');
    }

    public function ciudad()
    {
      return $this->belongsTo(Ciudad::class,'ciudad_id','id');
    }

    public function ciudades()
    {
        return $this->belongsToMany(Ciudad::class,'ciudad_tiendas','tienda_id','ciudad_id')
                    ->using(CiudadTienda::class)
                    ->as('domicilios')
                    ->withPivot('costo')
                    ->withTimestamps();
    }
}

