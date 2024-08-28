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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->string('statut');
            $table->float('totalAIB');
            $table->float('totalTVA');
            $table->float('totalHT');
            $table->float('totalTTC');
            $table->float('montantNet');
            $table->float('resteapayer');
            $table->date('datecom');
            $table->foreignId('fournisseur_id')->constrained('fournisseurs')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('commanders', function (Blueprint $table) {
            $table->primary(['produit_id', 'commande_id']);
            $table->integer('qtecom');
            $table->foreignId('produit_id')->constrained('produits')->onDelete('cascade');
            $table->foreignId('commande_id')->constrained('commandes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commanders');
        Schema::dropIfExists('commandes');
    }
};
