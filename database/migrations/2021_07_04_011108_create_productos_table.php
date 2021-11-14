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
            $table->string('nombre',100);
            $table->string('slug');
            $table->text('descripcion');
            $table->decimal('precio', 10, 0);
            // $table->string('guia_img')->nullable();
            $table->unsignedTinyInteger('categoria_id');
            $table->unsignedBigInteger('tienda_id');
            $table->enum('estado', ['nuevo', 'usado']);
            $table->enum('publicacion', [Producto::BORRADOR, Producto::PUBLICADO])->default(Producto::BORRADOR);
            $table->unsignedSmallInteger('cantidad')->nullable();
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
