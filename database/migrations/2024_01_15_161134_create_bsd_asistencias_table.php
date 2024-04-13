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
        Schema::create('bsd_asistencia', function (Blueprint $table) {
            $table->id();
            $table->string('dniA', 8);
            $table->string('nombreA', 50);
            $table->time('entradaA');
            $table->time('salidaA');
            $table->date('fechaA');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bsd_asistencia');
    }
};
