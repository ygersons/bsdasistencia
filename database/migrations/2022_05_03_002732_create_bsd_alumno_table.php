<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bsd_alumno', function (Blueprint $table) {
            $table->id();
            $table->string('anio');
            $table->string('dni', 8);
            $table->string('nombres', 50);
            $table->string('ape_pat', 25);
            $table->string('ape_mat', 25);
            $table->date('fecha_nacimiento')->nullable();
            $table->string('sexo', 15);
            $table->string('celular', 30)->comment('999999999 or +51 999999999');
            $table->string('email', 40);
            $table->string('codigo');
            $table->string('usuario_reg', 255)->default('system');
            $table->string('usuario_act', 255)->nullable();

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bsd_alumno');
    }
};
