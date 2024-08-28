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
        Schema::create('ventes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->date('datevente');
            $table->float('totalTVA');
            $table->float('totalHT');
            $table->float('totalTTC');            
            $table->float('tauxremise');
            $table->float('totalremise');
            $table->float('totalrecu');
            $table->float('resteapayer');
            $table->float('montantNet');
            $table->timestamps();
        });

        Schema::create('vendres', function (Blueprint $table) {
            $table->primary(['produit_id', 'vente_id']);
            $table->integer('qtesortie');
            $table->foreignId('produit_id')->constrained('produits')->onDelete('cascade');
            $table->foreignId('vente_id')->constrained('ventes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendres');
        Schema::dropIfExists('ventes');
    }
};
