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
        Schema::create('ventas_abordaje', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ejecucion_id'); 
            $table->foreign('ejecucion_id')->references('id')->on('ejecuciones_actividad');
            $table->string('num_abrodadas')->nullable();
            $table->string('preventa_iluma')->nullable();
            $table->string('estado')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas_abordaje');
    }
};
