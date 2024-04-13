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
        Schema::create('bsd_apoderado', function (Blueprint $table) {
            $table->id();
            $table->string('doc_identidad',3);
            $table->string('nro_doc_iden',20);
            $table->string('ape_pat',25);
            $table->string('ape_mat',25);
            $table->string('nombres',50);
            $table->string('celular',30);
            $table->string('email',40);
            $table->string('sexo',1);
            $table->string('dni_alumno',8);
            $table->string('parentesco',25);
            $table->string('ind_vigencia',1);
            $table->string('usuario_crea',255);
            $table->string('usuario_act',255);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bsd_apoderado');
    }
};
