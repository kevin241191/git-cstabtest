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
        Schema::create('receptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('commande_id')->constrained('commandes')->onDelete('cascade');
            $table->date('echeance');
            $table->string('statut');
            $table->string('reference');
            $table->timestamps();
        });

        Schema::create('receptionners', function (Blueprint $table) {
            $table->primary(['produit_id', 'reception_id']);
            $table->integer('qterecu');
            $table->foreignId('produit_id')->constrained('produits')->onDelete('cascade');
            $table->foreignId('reception_id')->constrained('receptions')->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receptionners');
        Schema::dropIfExists('receptions');
    }
};
