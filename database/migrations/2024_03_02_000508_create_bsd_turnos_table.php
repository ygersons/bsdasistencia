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
        Schema::create('bsd_turno', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',25);
            $table->string('descripcion',100);
            $table->date('fecha_ini'); 
            $table->date('fecha_fin');
            $table->time('hora_ini'); 
            $table->string('ind_vigencia',1); 
            $table->string('usuario_reg',255);
            $table->string('usuario_act',255);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bsd_turnos');
    }
};
