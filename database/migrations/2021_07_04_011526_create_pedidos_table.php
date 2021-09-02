<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id(); 
            $table->string('destinatario',100);
            $table->string('direccion',100);
            $table->string('especificacion',100)->nullable();
            $table->string('telefono',10);
            $table->decimal('desciento', 10, 0);
            $table->enum('estado', ['no enviado', 'enviado', 'recibido', 'cancelado']);
            $table->unsignedTinyInteger('ciudad_id');
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('tienda_id');
            $table->timestamps();
            $table->foreign('tienda_id')->references('id')->on('tiendas');
            $table->foreign('usuario_id')->references('id')->on('users');
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
        Schema::dropIfExists('pedidos');
    }
}
