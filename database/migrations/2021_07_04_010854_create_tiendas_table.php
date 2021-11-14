<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiendas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',50);
            $table->string('slug');
            $table->text('descripcion');
            $table->string('logo')->nullable();
            $table->string('fondo_img')->nullable();
            $table->string('direccion',100);
            $table->string('telefono',20);
            $table->boolean('recoger_tienda')->default(0);
            $table->string('email');
            $table->string('facebook');
            $table->string('whatsapp');
            $table->string('instagram');
            $table->unsignedBigInteger('user_id');
            $table->unsignedTinyInteger('ciudad_id');
            $table->softDeletes('deleted_at', 0);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('tiendas');
    }
}
