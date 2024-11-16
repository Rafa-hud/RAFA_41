<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('metodos_de_pago', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Nombre del método de pago
            $table->text('descripcion')->nullable(); // Descripción del método de pago
            $table->string('tipo')->default('Otro'); // Tipo del método (Digital, Efectivo, Tarjeta, etc.)
            $table->boolean('activo')->default(true); // Indica si el método de pago está activo o no
            $table->decimal('comision', 5, 2)->nullable(); // Comisión como porcentaje (e.g., 2.50%)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metodos_de_pago');
    }
};
