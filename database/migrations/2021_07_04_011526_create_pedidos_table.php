<?php

use App\Models\Pedido;
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
            $table->json('envio')->nullable();
            // $table->string('contacto',100);
            // $table->string('telefono',10);
            // $table->string('direccion',100);
            // $table->string('especificacion',100)->nullable();
            $table->decimal('costo_envio', 10, 0);
            $table->decimal('descuento', 10, 0);
            $table->decimal('total', 10, 0);
            $table->enum('estado', [Pedido::PENDIENTE,Pedido::PREPARANDO, Pedido::ENVIADO, Pedido::ENTREGADO, Pedido::CANCELADO])->default(Pedido::PENDIENTE);
            $table->enun('cancelado_autor',[1,2])->nullable();//1=cliente 2=tienda
            $table->enum('tipo_envio', [1, 2]);//1=recoge en tienda 2=domicilio
            $table->json('detalle');
            $table->unsignedTinyInteger('ciudad_id');
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('tienda_id');
            $table->softDeletes('deleted_at', 0);
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
