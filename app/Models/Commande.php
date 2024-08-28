<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'statut',
        'totalAIB',
        'totalTVA',
        'totalHT',
        'totalTTC',
        'montantNet',
        'resteapayer',
        'datecom',
        'fournisseur_id'
    ];

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }

    public function produits(): BelongsToMany
    {
        return $this->belongsToMany(Produit::class);
    }


    public function receptions()
    {
        return $this->hasMany(Reception::class, 'commande_id');
    }
}
