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
        Schema::create('utulisateurs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['admin', 'professeur', 'etudiant']);

            // Champ filiere_id
            $table->unsignedBigInteger('filiere_id')->nullable();

            // Clé étrangère (ancienne syntaxe)
            $table->foreign('filiere_id')->references('id')->on('filieres')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utulisateurs');
    }
};
