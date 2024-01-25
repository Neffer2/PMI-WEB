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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ventas_abordaje_id'); 
            $table->foreign('ventas_abordaje_id')->references('id')->on('ventas_abordaje');            

            $table->foreignId('interes_inicial'); 
            $table->foreign('interes_inicial')->references('id')->on('productos');
            $table->foreignId('interes_final'); 
            $table->foreign('interes_final')->references('id')->on('productos');
            $table->string('presentacion');
            $table->string('genero');
            $table->string('edad');
            $table->string('cantidad');

            $table->string('gusto_marca');
            $table->string('razon_gusto_marca');

            $table->string('gusto_marca_competencia');
            $table->string('razon_gusto_marca_competencia');

            $table->boolean('mesaje_dispositivos_entregado');
            $table->string('marca_mesaje_dispositivos');

            $table->boolean('mesaje_cigarrillos_entregado');
            $table->string('marca_mesaje_cigarrillos');

            $table->boolean('intervencion_alternativas_libres_humo');
            $table->boolean('intervencion_diferencia_fumar');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
