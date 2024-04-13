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
        Schema::create('bsd_justificacion', function (Blueprint $table) {
            $table->id();
            $table->string('codigo',10);
            $table->string('dni',8);
            $table->date('fecha_reg');
            $table->string('justificacion',50);
            $table->string('observacion',200);
            $table->string('vigencia_ind');
            $table->string('usuario_update')->nullable();;
            $table->date('fecha_update')->nullable();;
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('bsd_justificacion');
    }
};
