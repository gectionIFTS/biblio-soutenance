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
        Schema::table('documents', function (Blueprint $table) {
            // Modifier la colonne chemin_fichier pour ajouter une valeur par défaut
            $table->string('chemin_fichier')->default('/documents/default.pdf')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            // Si besoin d'annuler la modification (remettre sans valeur par défaut)
            $table->string('chemin_fichier')->nullable(false)->change();
        });
    }
};
