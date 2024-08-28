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
        Schema::create('reglement_fournisseurs', function (Blueprint $table) {
            $table->id(); 
            $table->string('reference');
            $table->foreignId('facture_fournisseur_id')->constrained('facture_fournisseurs')->onDelete('cascade');
            $table->foreignId('mode_id')->constrained('modes')->onDelete('cascade');
            $table->float('montantpaie');
            $table->float('resteapayer'); 
            $table->float('resteavant');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reglement_fournisseurs');
    }
};
