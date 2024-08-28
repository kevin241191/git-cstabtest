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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('reference');
            $table->string('nomprod');
            $table->integer('qte');
            $table->float('prix_achat');
            $table->string('modele');
            $table->integer('codebarre');    
            $table->foreignId('groupe_id')->constrained('groupes')->onDelete('cascade');          
            $table->foreignId('categorie_id')->constrained('categories')->onDelete('cascade');    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
