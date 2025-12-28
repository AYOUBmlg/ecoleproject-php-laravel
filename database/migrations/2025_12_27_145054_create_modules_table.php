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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
             $table->string('nom');
            $table->text('description')->nullable();
            

            // Relations
            $table->unsignedBigInteger('filiere_id');
            $table->unsignedBigInteger('professeur_id');

            $table->foreign('filiere_id')->references('id') ->on('filieres')->onDelete('cascade');

            $table->foreign('professeur_id')->references('id') ->on('utulisateurs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('modules');

    }
};
