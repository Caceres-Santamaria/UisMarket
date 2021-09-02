<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->string('slug',150);
            $table->text('descripcion');
            $table->decimal('costo', 10, 0);
            $table->string('guia_img')->nullable();
            $table->string('descripcion_img')->nullable();
            $table->unsignedTinyInteger('subcategoria_id');
            $table->enum('estado', ['nuevo', 'usado']);
            $table->timestamps();
            $table->foreign('subcategoria_id')->references('id')->on('subcategorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
