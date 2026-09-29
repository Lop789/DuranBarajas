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
        Schema::create('registro_huellas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')
            ->constrained('usuarios')
            ->restrictOnDelete()
            ->cascadeOnUpdate();
            
            $table->foreignId('actividad_id')
            ->constrained('actividades')
            ->restrictOnDelete()
            ->cascadeOnUpdate();
            
            $table->decimal('cantidad', 10, 2);
            $table->string('unidad');
            $table->decimal('impacto_calculado', 10, 2);
            $table->date('fecha');
            $table->text('observaciones')->nullable();
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_huellas');
    }
};
