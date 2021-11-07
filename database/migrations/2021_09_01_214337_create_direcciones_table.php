<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->id();
            $table->string('contacto',100);
            $table->string('telefono',20);
            $table->string('direccion',100);
            $table->string('especificacion',100)->nullable();
            $table->unsignedTinyInteger('ciudad_id');
            $table->string('codigo_postal')->nullable();
            $table->enum('predeterminado', [1,2]);
            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('ciudad_id')->references('id')->on('ciudades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direcciones');
    }
}
