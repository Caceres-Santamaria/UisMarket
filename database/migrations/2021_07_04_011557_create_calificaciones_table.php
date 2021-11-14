<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('calificacion');
            $table->unsignedBigInteger('pedido_id');
            $table->timestamps();
            $table->foreign('pedido_id')->references('id')->on('pedidos');
        });

        // Add the constraint
        DB::statement('ALTER TABLE calificaciones ADD CHECK (calificacion > 1 AND calificacion <= 5);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calificaciones');
    }
}
