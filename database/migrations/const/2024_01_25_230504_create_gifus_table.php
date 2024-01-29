<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gifus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ventas_abordaje_id'); 
            $table->foreign('ventas_abordaje_id')->references('id')->on('ventas_abordaje');            
            $table->foreignId('producto_id'); 
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->string('genero');
            $table->string('edad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gifus');
    }
};
