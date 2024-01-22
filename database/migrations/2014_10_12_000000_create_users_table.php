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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('ciudad_id'); 
            $table->foreign('ciudad_id')->references('id')->on('ciudades');
            $table->foreignId('rol_id');
            $table->foreign('rol_id')->references('id')->on('roles');
            $table->foreignId('estado_id'); 
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->rememberToken();
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};