<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('producto_id');
            $table->unsignedSmallInteger('color_id');
            $table->unsignedSmallInteger('cantidad')->nullable();
            $table->timestamps();
            $table->unique(['producto_id','color_id']);
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('color_id')->references('id')->on('colores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('color_productos');
    }
}
