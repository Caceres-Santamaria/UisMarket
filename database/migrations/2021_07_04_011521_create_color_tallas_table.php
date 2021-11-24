<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorTallasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_tallas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('talla_id');
            $table->unsignedSmallInteger('color_id');
            $table->unsignedSmallInteger('cantidad')->nullable();
            $table->string('guia_img')->nullable();
            $table->timestamps();
            $table->unique(['talla_id','color_id']);
            $table->foreign('talla_id')->references('id')->on('tallas')->onDelete('cascade');
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
        Schema::dropIfExists('color_tallas');
    }
}
