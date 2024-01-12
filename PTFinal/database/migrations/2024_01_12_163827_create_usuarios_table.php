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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nick')->unique;
            $table->string('email')->unique;
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('dni')->unique;
            $table->date('fecha_nacimineto');
            $table->string('contraseña');
            $table->enum('rol',['Usuario','Admin']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
