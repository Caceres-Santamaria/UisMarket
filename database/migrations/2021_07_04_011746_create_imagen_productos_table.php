<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagenProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagen_productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion',100);
            $table->unsignedTinyInteger('prioridad');
            $table->unsignedBigInteger('talla-color-producto_id');
            $table->timestamps();
            $table->foreign('talla-color-producto_id')->references('id')->on('talla-color-productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagen_productos');
    }
}
