<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiudadTiendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciudad_tiendas', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('ciudad_id');
            $table->unsignedBigInteger('tienda_id');
            $table->decimal('costo', 10, 0);
            $table->timestamps();
            $table->unique(['ciudad_id','ciudad_id']);
            $table->foreign('ciudad_id')->references('id')->on('ciudades');
            $table->foreign('tienda_id')->references('id')->on('tiendas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ciudad_tiendas');
    }
}
