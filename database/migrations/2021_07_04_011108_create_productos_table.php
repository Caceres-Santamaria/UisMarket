<?php

use App\Models\Producto;
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
            $table->string('nombre',100)->index();
            $table->string('slug');
            $table->text('descripcion');
            $table->decimal('precio', 10, 0);
            $table->decimal('descuento', 3, 2)->default(0);
            $table->unsignedTinyInteger('categoria_id');
            $table->unsignedBigInteger('tienda_id');
            $table->enum('estado', ['nuevo', 'usado'])->index();
            $table->enum('publicacion', [Producto::BORRADOR, Producto::PUBLICADO,Producto::SUSPENDIDO])->default(Producto::BORRADOR);
            $table->boolean('revision')->default(false);
            $table->unsignedSmallInteger('cantidad')->nullable();
            $table->boolean('color')->default(false);
            $table->boolean('talla')->default(false);
            $table->string('guia_img')->nullable();
            $table->softDeletes('deleted_at', 0);
            $table->timestamps();
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('tienda_id')->references('id')->on('tiendas')->onDelete('cascade');
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
