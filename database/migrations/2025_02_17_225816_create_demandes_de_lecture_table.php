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
        Schema::create('demandes_de_lecture', function (Blueprint $table) {
            $table->id();
            $table->foreignId('etudiant_id')->constrained('users')->onDelete('cascade'); // L'étudiant qui fait la demande
            $table->foreignId('document_id')->constrained('documents')->onDelete('cascade'); // Le livre demandé
            $table->enum('statut', ['attente' ,'approuvee', 'refusee'])->default('attente'); // Statut de la demande
            $table->timestamp('date_demande')->default(now());
            $table->timestamp('date_reponse')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes_de_lecture');
    }
};
