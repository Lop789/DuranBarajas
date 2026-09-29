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
        Schema::create('actividades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_id')
            ->constrained('categorias')
            ->restrictOnDelete()
            ->cascadeOnUpdate();
            
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->string('unidad');
            $table->decimal('factor_emision', 10, 4);
            $table->string('tipo')->nullable();
            $table->string('imagen')->nullable();
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actividads');
    }
};
