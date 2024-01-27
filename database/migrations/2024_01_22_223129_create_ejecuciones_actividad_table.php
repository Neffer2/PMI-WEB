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
        Schema::create('ejecuciones_actividad', function (Blueprint $table) {
            $table->id();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreignId('user_id');
            $table->foreign('punto_id')->references('id')->on('puntos_venta');
            $table->foreignId('punto_id');
            $table->date('fechaVisita');
            $table->string('estrato');
            $table->string('barrio');
            $table->boolean('mensaje_foco');
            $table->string('selfie_pdv');
            $table->string('foto_fachada');

            $table->boolean('cerrado')->default(0);
            $table->string('foto_cierre')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ejecuciones_actividad');
    }
};
