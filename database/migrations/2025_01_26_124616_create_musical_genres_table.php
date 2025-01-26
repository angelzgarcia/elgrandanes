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
        Schema::create('musical_genres', function (Blueprint $table) {
            $table->id();
            $table->string('genero', '30') -> unique();
            $table->foreignId('idCategoriaMusical')
                    ->constrained('musical_genres_categories')
                    ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musical_genres');
    }
};
