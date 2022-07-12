<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Tienda;

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
            $table->string('direccion',100)->nullable();
            $table->string('telefono',10);
            $table->boolean('recoger_tienda')->default(0);
            $table->boolean('recoger_uis')->default(0);
            $table->enum('estado',[Tienda::PENDIENTE,Tienda::VALIDADA,Tienda::SUSPENDIDA,Tienda::RECHAZADA])->default(Tienda::PENDIENTE);
            $table->string('carnet',255);
            $table->text('comentario')->nullable();
            $table->boolean('revision')->default(false);
            $table->string('email');
            $table->string('facebook')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('instagram')->nullable();
            $table->string('messenger')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedTinyInteger('ciudad_id');
            $table->softDeletes('deleted_at', 0);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
