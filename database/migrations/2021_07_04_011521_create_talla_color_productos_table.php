<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTallaColorProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talla_color_productos', function (Blueprint $table) {
            $table->id();
            $table->string('color',50);
            $table->unsignedBigInteger('talla_producto_id');
            $table->decimal('descuento', 3, 2)->default(0);
            $table->unsignedBigInteger('tienda_id');
            $table->timestamps();
            $table->foreign('tienda_id')->references('id')->on('tiendas');
            $table->foreign('talla_producto_id')->references('id')->on('talla_productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('talla_color_productos');
    }
}
