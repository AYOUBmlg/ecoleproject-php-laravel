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
        Schema::create('cours', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description')->nullable();
            $table->enum('type', ['Cours', 'TD', 'TP']);
            $table->string('fichier');

            $table->unsignedBigInteger('module_id');
            $table->unsignedBigInteger('filiere_id');
            $table->unsignedBigInteger('professeur_id');

            $table->foreign('module_id')->references('id')->on('modules');
            $table->foreign('filiere_id')->references('id')->on('filieres');
            $table->foreign('professeur_id')->references('id')->on('utulisateurs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cours');
    }
};
