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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('horario');
            $table->float('costo');
            // $table->string('integrantes');
            $table->mediumText('genero');
            $table->string('facebook') -> nullable();
            $table->string('instagram') -> nullable();
            $table->string('youtube') -> nullable();
            $table->boolean('reservacion') -> default(false);
            $table->tinyText('cupos') -> nullable();
            $table->string('imagen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
